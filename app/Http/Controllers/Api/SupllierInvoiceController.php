<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierInvoice;
use App\Http\Resources\SupplierInvoiceCollection;
use App\Http\Resources\SupplierInvoiceResource;

class SupllierInvoiceController extends Controller
{
    public function index()
    {
        return  SupplierInvoiceResource::collection(SupplierInvoice::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  SupplierResource::collection(Supplier::where($field,'LIKE',"%$query%")->latest()->paginate(10));
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
        return new SupplierInvoiceResource(SupplierInvoice::find($id));
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
        $SupplierInvoice = SupplierInvoice::find($id);
        $SupplierInvoice->delete();
    }
}
