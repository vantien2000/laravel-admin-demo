<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RulesLogin;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return View('Admin.login.index');
    }

    public function login(Request $request){

        if($request->isMethod('post'))
        {
            $email = $request->input('email');
            $password = $request->input('password');
            $validator = new RulesLogin();
            if(isset($request->remember_me[0])){
                Cookie::queue('email', $email,10*365*24*3600);
                Cookie::queue('password', $password,10*365*24*3600);
                if(Auth::attempt(['email' => $request->cookie('email'), 'password' => $request->cookie('password')])){
                    return redirect('admin/home');
                }else{
                    return Redirect('admin/login')->withInput()->withErrors($validator->messages());
                }
            }
            else{
                Cookie::queue('email','',10*365*24*3600);
                Cookie::queue('password','',10*365*24*3600);
                if(Auth::attempt(['email' => $email, 'password' =>$password])){
                    return redirect('admin/home');
                }else{
                    return Redirect('admin/login')->withInput()->withErrors($validator->messages());
                } 
            }
            
        }
    }

    public function logout(){
        if(Auth::logout()){
            return redirect('admin/login');
        }
        return redirect('admin/home');
    }
}
