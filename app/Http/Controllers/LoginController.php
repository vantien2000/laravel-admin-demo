<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return View('login.index');
    }

    public function login(Request $request){
        if($request->isMethod('post'))
        {
            $email = $request->input('email');
            $password = $request->input('password');

            $validator = $request->validate([
                'password' => 'required|min:0',
                'email' => 'required|email|max:255'
                ],
                [
                    'email.required' => 'email không được để trống',
                    'password.required' => 'password không được để trống',
                    'email.max' => 'email vượt quá ký tự'
                ]
            );
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect('/');
            }
            else{
                return Redirect('/login')->withInput()->withErrors('Tài khoản hoặc mật khẩu không đúng!');
            }
        }
    }

    public function logout(){
        if(Auth::logout()){
            return redirect('/login');
        }
        return redirect('/');
    }
}
