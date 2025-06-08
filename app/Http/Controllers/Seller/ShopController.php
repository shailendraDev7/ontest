<?php

namespace App\Http\Controllers\Seller;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\Shop;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function view()
    {
        $shop = Shop::where(['seller_id' => auth('seller')->id()])->first();
        if (isset($shop) == false) {
            DB::table('shops')->insert([
                'seller_id' => auth('seller')->id(),
                'name' => auth('seller')->user()->f_name,
                'address' => '',
                'contact' => auth('seller')->user()->phone,
                'image' => 'def.png',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $shop = Shop::where(['seller_id' => auth('seller')->id()])->first();
        }

        return view('seller-views.shop.shopInfo', compact('shop'));
    }

    public function edit($id)
    {
        $shop = Shop::where(['seller_id' =>  auth('seller')->id()])->first();
        return view('seller-views.shop.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'banner'      => 'mimes:png,jpg,jpeg|max:2048',
            'image'       => 'mimes:png,jpg,jpeg|max:2048',
        ], [
            'banner.mimes'   => 'Banner image type jpg, jpeg or png',
            'banner.max'     => 'Banner Maximum size 2MB',
            'image.mimes'    => 'Image type jpg, jpeg or png',
            'image.max'      => 'Image Maximum size 2MB',
        ]);

        $shop = Shop::find($id);
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->contact = $request->contact;
        if ($request->image) {
            $shop->image = ImageManager::update('shop/', $shop->image, 'png', $request->file('image'));
        }
        if ($request->banner) {
            $shop->banner = ImageManager::update('shop/banner/', $shop->banner, 'png', $request->file('banner'));
        }
        $shop->save();

        Toastr::info('Shop updated successfully!');
        return redirect()->route('seller.shop.view');
    }

}
