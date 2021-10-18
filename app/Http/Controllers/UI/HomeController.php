<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Models\Slides;
use App\Models\Category;
use App\Models\Products;

class HomeController extends Controller
{
    public function index(Request $request){
        $slides = Slides::all();
        $categories = Category::all();
        $products = Products::all();        
        if(!empty($request->cookie('customer_login'))){
            return View('UI.layout.master')
            ->with(['customer'=>json_decode($request->cookie('customer_login')),
            'slides'=>$slides,'cats'=>$categories,'products'=>$products]);
        }
        return View('UI.layout.master')->with(['slides'=>$slides,'cats'=>$categories,'products'=>$products]);
    }
}
