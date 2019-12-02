<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;

class CustomerController extends Controller
{
   public function index()
    {
       return  DefaultResource::collection(Customer::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
       return  DefaultResource::collection(Customer::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required'
        ]);

        $customer = new Customer;
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->save();
        return $customer;
    }

    public function show($id)
    {
        return new customerResource(customer::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required'
        ]);

        $customer = customer::find($id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_email = $request->customer_email;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_address = $request->customer_address;
        $customer->save();
        return $customer;
    }

    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();
    }
}
