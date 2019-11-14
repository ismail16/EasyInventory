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
        return  SupplierResource::collection(Supplier::orderBy('id','desc')->paginate(2));
    }

    public function search($field,$query)
    {
        return  SupplierResource::collection(Supplier::where($field,'LIKE',"%$query%")->latest()->paginate(2));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return new SupplierResource(Supplier::find($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }
}
