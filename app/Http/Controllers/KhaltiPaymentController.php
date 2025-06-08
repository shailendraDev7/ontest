<?php

namespace App\Http\Controllers;

use App\CPU\CartManager;
use App\CPU\Helpers;
use App\CPU\OrderManager;
use App\Model\BusinessSetting;
use App\Model\Currency;
use App\Model\Order;
use App\Model\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Http;
use App\CPU\Convert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KhaltiPaymentController extends Controller
{
    public function payment_process()
    {

        $discount = session()->has('coupon_discount') ? session('coupon_discount') : 0;
        $value = CartManager::cart_grand_total() - $discount;
        $tran = OrderManager::gen_unique_id();
        
        session()->put('transaction_ref', $tran);
  

        $YOUR_DOMAIN = url('/');

        $products = [];
        foreach (CartManager::get_cart() as $detail) {
            array_push($products, [
                'name' => $detail->product['name'],
                'image' => 'def.png'
            ]);
        }
        
        $user = auth('customer')->user();
    
        $khalti_secret_key = config('khalti.secret_key');
        $khalti_base_url = config('khalti.base_url');
        

        $response = Http::withHeaders([
            'Authorization' => 'Key ' . $khalti_secret_key,
            'Content-Type' => 'application/json',
        ])->post($khalti_base_url.'/epayment/initiate/', [
            "return_url" => $YOUR_DOMAIN . '/pay-khalti/success',
            "website_url" => $YOUR_DOMAIN,
            "amount" => (int) (round(Convert::default($value), 2) * 100), // Amount in Paisa
            "purchase_order_id" => $tran,
            "purchase_order_name" => $products[0]['name'],
            "customer_info" => [
                "name" => $user->f_name .' '. $user->l_name,
                "email" => $user->email,
                "phone" => $user->phone,
            ]
        ]);
        
        if ($response->status() === 200) {
            $responseData = $response->json();

            if (isset($responseData['pidx']) && isset($responseData['payment_url'])) {
        
                return redirect($responseData['payment_url']);
            } else {
                Log::error('Missing pidx or payment_url in response', ['response' => $responseData]);

            }
        } else {
    
            Log::error('Failed to initiate payment', ['status' => $response->status(), 'response' => $response->json()]);

        }
        
       return redirect()->route('pay-khalti.fail');
    }

    public function success(Request $request)
    {
        
        // verify payment 
        
        $pidx = $request->input('pidx');

        if (!$pidx) {
            return redirect()->route('pay-khalti.fail');
        }
        
         $khalti_secret_key = config('khalti.secret_key');
        $khalti_base_url = config('khalti.base_url');

        $response = Http::withHeaders([
            'Authorization' => 'key ' .$khalti_secret_key ,
            'Content-Type' => 'application/json',
        ])->post($khalti_base_url.'/epayment/lookup/', [
            'pidx' => $pidx,
        ]);
        
       if ($response->successful() && $request->input('purchase_order_id') === session('transaction_ref')) {
            $responseData = $response->json();

            if ($responseData['status'] === 'Completed') {
                
                // place order
                 $unique_id = OrderManager::gen_unique_id();
                $order_ids = [];
                foreach (CartManager::get_cart_group_ids() as $group_id) {
                    $data = [
                        'payment_method' => 'Khalti',
                        'order_status' => 'confirmed',
                        'payment_status' => 'paid',
                        'transaction_ref' => session('transaction_ref'),
                        'order_group_id' => $unique_id,
                        'cart_group_id' => $group_id
                ];
                $order_id = OrderManager::generate_order($data);
                array_push($order_ids, $order_id);
            }
            CartManager::cart_clean();
            if (auth('customer')->check()) {
                Toastr::success('Payment success.');
                return view('web-views.checkout-complete');
            }
            return response()->json(['message' => 'Payment succeeded'], 200);
            }
        }
       else {
             Log::error('payment verification failed', ['status' => $response->status(), 'response' => $response->json()]);
             return redirect()->route('pay-khalti.fail');

       }
        
    }

    public function fail()
    {
        if (auth('customer')->check()) {
            Toastr::error('Payment failed.');
            return redirect()->route('account-oder');
        }
        return response()->json(['message' => 'Payment failed'], 403);
    }
}
