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
        return view('admin.layouts.dashboard');
    }

}
