<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Models\SupplierInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function index()
    {

        return view('admin.layouts.dashboard');
        
    }

    public function supplier()
    {
        return view('admin.supplier.index');
    }

    public function category()
    {
        return view('admin.category.index');
    } 

    public function warehouse()
    {
        return view('admin.warehouse.index');
    }

    public function supplier_invoice()
    {
        return view('admin.supplier_invoice.index');
    }
    public function supplier_invoice_create()
    {
        return view('admin.supplier_invoice.create');
    }

    public function supplier_invoice_store(Request $request)
    {
//        return $request;

        $supplierInvoice = new SupplierInvoice;

        $supplierInvoice->supplier_id = $request->supplier_id;
        $supplierInvoice->warehouse_id = $request->warehouse_id;
        $supplierInvoice->datepicker_invoice_exp = $request->datepicker_invoice_exp;
        $supplierInvoice->image = $request->image;
        $supplierInvoice->product_name = $request->product_name;
        $supplierInvoice->product_quantity = $request->product_quantity;
        $supplierInvoice->product_rate = $request->product_rate;
        $supplierInvoice->total_price = $request->total_price;
        $supplierInvoice->grand_total_price = $request->grand_total_price;
        $supplierInvoice->paid_amount = $request->paid_amount;
        $supplierInvoice->due_amount = $request->due_amount;
        $supplierInvoice->status = 1;

        $supplierInvoice->save();
        return back();


//        return view('admin.supplier_invoice.create');
    }


}
