<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Events\MessageEvents;
use DB;

class ChatController extends Controller
{
    public function index(){
        $message = Message::all();
        
        return View('chat.index',['messages'=>$message]);
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
