<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index()
    {
       return  DefaultResource::collection(Staff::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
       return  DefaultResource::collection(Staff::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_name' => 'required',
            'staff_user_name' => 'required',
            'user_type' => 'required',
            'staff_password' => 'required'
        ]);

        $staff = new Staff;
        $staff->staff_name = $request->staff_name;
        $staff->staff_user_name = $request->staff_user_name;
        $staff->staff_phone = $request->staff_phone;
        $staff->staff_address = $request->staff_address;
        $staff->user_type = $request->user_type;
        $staff->staff_password = Hash::make($request->staff_password);
        $staff->status = 1;
        $staff->save();
        return $staff;
    }

    public function show($id)
    {
        return new DefaultResource(Staff::find($id));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'staff_name' => 'required'
        // ]);

        $staff = Staff::find($id);

        $staff->staff_name = $request->staff_name;
        $staff->staff_user_name = $request->staff_user_name;
        $staff->staff_phone = $request->staff_phone;
        $staff->staff_address = $request->staff_address;
        $staff->user_type = $request->user_type;
        if ($request->staff_password) {
            $staff->staff_password = Hash::make($request->staff_password);
        }
        $staff->status = 1;
        $staff->save();
        return $staff;
    }

    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
    }
}
