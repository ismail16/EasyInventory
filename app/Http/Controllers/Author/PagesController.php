<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
	public function __construct(){
        $this->middleware('auth');

    }
    
    public function index()
    {
        return view('author.layouts.dashboard');
    }
}
