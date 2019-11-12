<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        return view('admin.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $supplier = new Supplier;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_contact_name = $request->supplier_contact_name;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
//        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_contact_name = $request->supplier_contact_name;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

    }
}
