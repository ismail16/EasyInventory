<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierInvoice;
use App\Http\Resources\DefaultCollection;
use App\Http\Resources\DefaultResource;

class SupllierInvoiceController extends Controller
{
    public function index()
    {
        return  DefaultResource::collection(SupplierInvoice::orderBy('id','desc')->paginate(10));
    }

    public function search($field,$query)
    {
        return  DefaultResource::collection(SupplierInvoice::where($field,'LIKE',"%$query%")->latest()->paginate(10));
    }

    public function store(Request $request)
    {

        return $request;

        // $request->validate([
        //     'supplier_id' => 'required'
        // ]);

        $supplier_invoice = new SupplierInvoice;
        $supplier_invoice->supplier_id = $request->supplier_id;
        $supplier_invoice->warehouse_id = $request->warehouse_id;
        $supplier_invoice->datepicker_invoice_exp = $request->datepicker_invoice_exp;
        // $supplier_invoice->image = $request->image;
        $supplier_invoice->product_name = $request->product_name;
        $supplier_invoice->product_quantity = $request->product_quantity;
        $supplier_invoice->product_rate = $request->product_rate;
        $supplier_invoice->total_price = $request->total_price;
        $supplier_invoice->grand_total_price = $request->grand_total_price;
        $supplier_invoice->paid_amount = $request->paid_amount;
        $supplier_invoice->due_amount = $request->due_amount;
        $supplier_invoice->status = 1;
        $supplier_invoice->save();
        return $supplier_invoice;


    }

    public function show($id)
    {
        return new DefaultResource(SupplierInvoice::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_name' => 'required'
        ]);

        $supplier = SupplierInvoice::find($id);
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
