<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Resources\SupplierCollection;
use App\Http\Resources\SupplierResource;


class SupllierController extends Controller
{
    public function index()
    {
       return  SupplierResource::collection(Supplier::orderBy('id','desc')->paginate(3));
    }

    public function search($field,$query)
    {
       return  SupplierResource::collection(Supplier::where($field,'LIKE',"%$query%")->latest()->paginate(3));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required'
        ]);

        $supplier = new Supplier;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_contact_name = $request->supplier_contact_name;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
        return $supplier;
    }

    public function show($id)
    {
        return new SupplierResource(Supplier::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_name' => 'required'
        ]);

        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_contact_name = $request->supplier_contact_name;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
        return $supplier;
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
