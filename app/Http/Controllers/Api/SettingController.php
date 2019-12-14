<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{

    public function store(Request $request)
    {

        $request->validate([
            'supplier_id' => 'required'
        ]);

        $settings = new Setting;
        $settings->store_name = $request->store_name;
        $settings->owner_name = $request->owner_name;
        $settings->store_mobile = $request->store_mobile;
        $settings->store_email = $request->store_email;
        $settings->navbar_color = $request->navbar_color;
        $settings->sidebar_color = $request->sidebar_color;
        $settings->text_size = $request->text_size;
        $settings->store_address = $request->store_address;
        $settings->status = 1;

        if($request->store_logo){
            $store_logo = time().'.' . explode('/', explode(':', substr($request->store_logo, 0, strpos($request->store_logo, ';')))[1])[1];
            \Image::make($request->store_logo)->save(public_path('images/settings/').$store_logo);
            $request->merge(['image' => $store_logo]);
        }else{
            $store_logo = 'default.png';
        } 
        $settings->store_logo = $store_logo ;

        if($request->owner_image){
            $owner_image = time().'.' . explode('/', explode(':', substr($request->owner_image, 0, strpos($request->owner_image, ';')))[1])[1];
            \Image::make($request->owner_image)->save(public_path('images/settings/').$owner_image);
            $request->merge(['image' => $owner_image]);
        }else{
            $owner_image = 'default.png';
        }
        $settings->owner_image = $owner_image ;

        $settings->save();
        return $settings;
    }


    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        $settings = Setting::find($id);

        //  $request->validate([
        //     'supplier_id' => 'required'
        // ]);
        
        $settings = new SupplierInvoice;
        $settings->store_name = $request->store_name;
        $settings->owner_name = $request->owner_name;
        $settings->store_mobile = $request->store_mobile;
        $settings->store_email = $request->store_email;
        $settings->navbar_color = $request->navbar_color;
        $settings->sidebar_color = $request->sidebar_color;
        $settings->text_size = $request->text_size;
        $settings->store_address = $request->store_address;
        $settings->status = 1;

        if($request->store_logo){
            $store_logo = time().'.' . explode('/', explode(':', substr($request->store_logo, 0, strpos($request->store_logo, ';')))[1])[1];
            \Image::make($request->store_logo)->save(public_path('images/settings/').$store_logo);
            $request->merge(['image' => $store_logo]);
        }else{
            $store_logo = 'default.png';
        } 
        $settings->store_logo = $store_logo ;

        if($request->owner_image){
            $owner_image = time().'.' . explode('/', explode(':', substr($request->owner_image, 0, strpos($request->owner_image, ';')))[1])[1];
            \Image::make($request->owner_image)->save(public_path('images/settings/').$owner_image);
            $request->merge(['image' => $owner_image]);
        }else{
            $owner_image = 'default.png';
        }
        $settings->owner_image = $owner_image ;

        $settings->save();
        return $settings;
    }

    public function destroy($id)
    {

    }
}
