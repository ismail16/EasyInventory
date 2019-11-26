<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupplierInvoice;
use App\Models\SupplierInvoiceProduct;
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


        $request->validate([
            'supplier_id' => 'required',
            'warehouse_id' => 'required',
            'invoice_date' => 'required',
            'grand_total_price' => 'required'
        ]);

        $supplier_invoice = new SupplierInvoice;
        $supplier_invoice->invoice_no = 1111;
        $supplier_invoice->supplier_id = $request->supplier_id;
        $supplier_invoice->warehouse_id = $request->warehouse_id;
        $supplier_invoice->invoice_date = $request->invoice_date;
        $supplier_invoice->grand_total_price = $request->grand_total_price;
        $supplier_invoice->paid_amount = $request->paid_amount;
        $supplier_invoice->due_amount = $request->due_amount;
        $supplier_invoice->discount = $request->discount;
        $supplier_invoice->status = 1;

        if($request->image){
            $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('images/supplier_invoice/').$name);
            $request->merge(['image' => $name]);
            // $userPhoto = public_path('img/profile/').$currentPhoto;
            // if(file_exists($userPhoto)){
            //     @unlink($userPhoto);
            // }
        }
        $supplier_invoice->image = $name ;


        $supplier_invoice->save();



        $products = $request->products;
        for ($i=0; $i < count($products); $i++) { 
            $supplierInvoiceProduct = new SupplierInvoiceProduct;
            $supplierInvoiceProduct->supplier_invoice_id = $supplier_invoice->id;
            $supplierInvoiceProduct->product_name = $products[$i]['product_name'];
            $supplierInvoiceProduct->product_quantity = $products[$i]['product_quantity'];
            $supplierInvoiceProduct->product_price = $products[$i]['product_price'];
            $supplierInvoiceProduct->status = 1;
            $supplierInvoiceProduct->save();
        }

        // return $supplierInvoiceProduct;

        return array('supplier_invoice' => $supplier_invoice, 'supplierInvoiceProduct' => $supplierInvoiceProduct);


    }

    public function show($id)
    {


        $supplier_invoice = SupplierInvoice::find($id);
        $supplierInvoiceProduct = SupplierInvoiceProduct::where('supplier_invoice_id',$id)->get();

        return array('supplierInvoice' => $supplier_invoice, 'supplierInvoiceProduct' => $supplierInvoiceProduct);
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
