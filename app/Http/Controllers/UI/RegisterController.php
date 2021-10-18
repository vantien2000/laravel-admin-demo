<?php

namespace App\Http\Controllers\UI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRules;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class RegisterController extends Controller
{
    public function register(Request $request){
        $arr = array();
        foreach((array)$request->all() as $key=>$value)
        {
            if($value == NULL)
                array_push($arr,[$key=>'không được để chống']);
        }
       
        if(isset($request->policy[0])){
            //kiểm tra email có tồn tại hay ko
            $email = Customer::where('email','=',$request->email)->first();
            if(isset($email)){
                array_push($arr,['email'=>'email đã tồn tại']);
                return response()->json(['errors'=>$arr]);
            }
            else{
                if(!empty($arr)){
                    return response()->json(['errors'=>$arr,'confirm'=>false]);
                }else{
                    $customer = Customer::create(['first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,'email'=>$request->email,'password'=>bcrypt($request->password),
                    'avatar'=>'']);
                    return response()->json(['confirm'=>true]);
                }
            }
            
        }
        else{
            return response()->json(['errors'=>$arr,'confirm'=>false]);
        }
        
    }
}
