<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{

    public function store(Request $request)
    {

    }


    public function show($id)
    {
        $settings = Setting::find($id);
        return $settings;
    }

    public function update(Request $request, $id)
    {


        $req  = $request->setting;
        $settings = Setting::find($id);

        $settings->store_name = $req['store_name'];
        $settings->owner_name = $req['owner_name'];
        $settings->store_mobile = $req['store_mobile'];
        $settings->store_email = $req['store_email'];
        $settings->store_currency = $req['store_currency'];
        $settings->navbar_color = $req['navbar_color'];
        $settings->sidebar_color = $req['sidebar_color'];
        $settings->text_size = $req['text_size'];
        $settings->store_address = $req['store_address'];
        $settings->status = 1;

        if($request->store_logo_url != null){

            $old_store_logo = public_path('images/store_logo/').$settings->store_logo;
            if(file_exists($old_store_logo)){
                @unlink($old_store_logo);
            }
            $store_logo = time().'.' . explode('/', explode(':', substr($req['store_logo'], 0, strpos($req['store_logo'], ';')))[1])[1];
            \Image::make($req['store_logo'])->save(public_path('images/store_logo/').$store_logo);
            $settings->store_logo = $store_logo ;
        }

        if($request->owner_img_url != null){
            $old_owner_image = public_path('images/owner_image/').$settings->owner_image;
            if(file_exists($old_owner_image)){
                @unlink($old_owner_image);
            }

            $owner_image = time().'.' . explode('/', explode(':', substr($req['owner_image'], 0, strpos($req['owner_image'], ';')))[1])[1];
            \Image::make($req['owner_image'])->save(public_path('images/owner_image/').$owner_image);
            $settings->owner_image = $owner_image ;
        }

        $settings->save();
        return $settings;
    }

    public function destroy($id)
    {

    }
}
