<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Events\MessageEvents;
use DB;

class ChatController extends Controller
{
    public function index(Request $request){
        $message = Message::all();
        //tạo session đếm số tin nhắn
        
        return View('Admin.chat.index',['messages'=>$message]);
    }

    public function sendMessage(Request $request){
        
        $message = new Message();
        $message->body = $request->input('body');
        $message->user_id = Auth::user()['id'];
        $message->save();
        
        event(
            $e = new MessageEvents($message)
        );
        return redirect()->back();
    }
}
