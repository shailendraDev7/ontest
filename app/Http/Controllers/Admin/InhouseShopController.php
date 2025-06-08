<?php

namespace App\Http\Controllers\Admin;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\BusinessSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InhouseShopController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin-views.product-settings.inhouse-shop');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request['email_verification'] == 1) {
            $request['phone_verification'] = 0;
        } elseif ($request['phone_verification'] == 1) {
            $request['email_verification'] = 0;
        }

        //comapy shop banner
        $imgBanner = BusinessSetting::where(['type' => 'shop_banner'])->first();
        if ($request->has('shop_banner')) {
            $imgBanner = ImageManager::update('shop/', $imgBanner, 'png', $request->file('shop_banner'));
            DB::table('business_settings')->updateOrInsert(['type' => 'shop_banner'], [
                'value' => $imgBanner
            ]);
        }

        Toastr::success('Updated successfully');
        return back();
    }

}
