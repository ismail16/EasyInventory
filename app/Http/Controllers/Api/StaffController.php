<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;
use App\Models\Staff;
use App\User;

class StaffController extends Controller
{
    public function index()
    {
       return  DefaultResource::collection(User::orderBy('id','desc')->paginate(10));
    }

    public function allStaff()
    {
       return  DefaultResource::collection(Staff::orderBy('id','desc')->get());
    }

    public function search($field,$query)
    {
       return  DefaultResource::collection(Staff::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_name' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required',
            'password' => 'required'
        ]);

        $staff = new User;
        $staff->staff_name = $request->staff_name;
        $staff->email = $request->email;
        $staff->staff_phone = $request->staff_phone;
        $staff->staff_address = $request->staff_address;
        $staff->role_id = $request->role_id;
        $staff->password = Hash::make($request->password);
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
        $staff = User::find($id);

        $request->validate([
            'staff_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$staff->id,
            'role_id' => 'required'
        ]);

        $staff->staff_name = $request->staff_name;
        $staff->email = $request->email;
        $staff->staff_phone = $request->staff_phone;
        $staff->staff_address = $request->staff_address;
        $staff->role_id = $request->role_id;
         if ($request->password) {
            $staff->password = Hash::make($request->password);
        }
        $staff->status = 1;
        $staff->save();
        return $staff;
    }

    public function destroy($id)
    {
        $staff = User::find($id);
        $staff->delete();
    }
}
