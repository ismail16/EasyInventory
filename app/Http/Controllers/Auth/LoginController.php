<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        if (Auth::check() && Auth::user()->role->id == 1){
            $this->redirectTo = 'admin/dashboard';
        }else{
            $this->middleware('guest')->except('logout');
        }
    }
}
