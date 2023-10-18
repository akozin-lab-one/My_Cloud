<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //loginPage
    public function LoginPage(){
        return view('login');
    }

    //RegisterPage
    public function RegisterPage(){
        return view('register');
    }

    //dashboard
    public function dashboard(){
        if(Auth::user()->user_role == 'admin'){
            return redirect()->route('admin#mainPage');
        }else{
            return redirect()->route('user#mainPage');
        }
    }
}
