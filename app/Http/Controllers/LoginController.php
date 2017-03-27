<?php

namespace Ecomm\Http\Controllers;

use Auth;
use Hash;
use Ecomm\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function __construct()
    {

    }

    public function login(Request $request)
    {   

        if (Auth::attempt(['user' => $request->input('username'), 'password' => $request->input('password')],true, true)) {
            // Authentication passed...
            return redirect()->route('landing');
        }
        return view('login',['data'=> array('error'=>'yes')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
