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

    public function documentation()
    {
        return view('documentation.index');
    }



    public function getSuppliers()
    {
        $suppliers = Supplier::orderBy('id','desc')->get();
        return $suppliers;
    }

   
}
