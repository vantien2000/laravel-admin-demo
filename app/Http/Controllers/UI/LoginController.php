<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Requests\RulesLogin;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class LoginController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        
        if(isset($request->signin_remember[0])){
            Cookie::queue('email', $email,10*365*24*3600);
            Cookie::queue('password', $password,10*365*24*3600);
            $customer = Customer::where('email','=',$request->cookie('email'),'and','password','=',bcrypt($request->cookie('password')))->first();
            if(isset($customer)){
                Cookie::queue('cutomer_login',$customer,10*365*24*3600);
                return response()->json(['confirm'=>true]);
            }else{
                return response()->json(['errors'=>'không tìm thấy người dùng này!']);
            }
        }else{
            Cookie::queue('email','',10*365*24*3600);
            Cookie::queue('password','',10*365*24*3600);
            $customer = Customer::where('email','=',$email,'and','password','=',bcrypt($password))->first();
            if(isset($customer)){
                Cookie::queue('customer_login',$customer,10*365*24*3600);
                return response()->json(['confirm'=>true]); 
            }else{
                return response()->json(['errors'=>'không tìm thấy người dùng này!']);
            }
        }
    }

    public function logout(Request $request){
        if($request->hasCookie('customer_login')){
            Cookie::queue(Cookie::forget('customer_login'));
            return ['ok' => true];
        }
        return ['ok' => false];
    }
}
