<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
class HomeController extends Controller
{
    public function index(Request $request){
        $request->session()->put('count',count(Message::all()));
        return View('Admin.home.index');
    }
}
