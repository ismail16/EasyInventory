<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class PagesController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function getSuppliers()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        return $suppliers;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
