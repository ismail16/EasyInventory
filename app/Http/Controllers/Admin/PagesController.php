<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Supplier;
use App\Models\SupplierInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

    }

    public function index()
    {
        $setting = Setting::find(1);

        return view('admin.layouts.dashboard',compact('setting'));
        
    }

    public function dassss()
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

        $supplierInvoice = new SupplierInvoice;

        $supplierInvoice->supplier_id = $request->supplier_id;
        $supplierInvoice->warehouse_id = $request->warehouse_id;
        $supplierInvoice->datepicker_invoice_exp = $request->datepicker_invoice_exp;


        $image = $request->file('image');
        if ($image){
            $imagename = $request->supplier_id.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('images/supplier_invoice/')){
                mkdir('images/supplier_invoice/', 0777, true);
            }
            $image->move('images/supplier_invoice/', $imagename);
        }else{
            $imagename = 'default.jpg';
        }

        $supplierInvoice->image = $imagename;

        $product_name_json = json_encode($request->product_name);
        $supplierInvoice->product_name = $product_name_json;

        $product_quantity_json = json_encode($request->product_quantity);
        $supplierInvoice->product_quantity = $product_quantity_json;

        $product_rate_json = json_encode($request->product_rate);
        $supplierInvoice->product_rate = $product_rate_json;

        $total_price_json = json_encode($request->total_price);
        $supplierInvoice->total_price = $total_price_json;


        $supplierInvoice->grand_total_price = $request->grand_total_price;
        $supplierInvoice->paid_amount = $request->paid_amount;
        $supplierInvoice->due_amount = $request->due_amount;
        $supplierInvoice->status = 1;

//       return $supplierInvoice;


        $supplierInvoice->save();
        return back();


//        return view('admin.supplier_invoice.create');
    }

    public function supplier_invoice_edit()
    {
        return view('admin.supplier_invoice.edit');
    }


}
