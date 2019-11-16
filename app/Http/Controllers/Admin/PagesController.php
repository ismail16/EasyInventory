<?php

namespace App\Http\Controllers\Admin;

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
