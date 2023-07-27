<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Message;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $receivedMessages = Message::where('receiver', '=', Auth::user()->email)->get();
        $sentMessages = Message::where('sender', '=', Auth::user()->email)->get();


        return view('message.index', [
            'receivedMessages' => $receivedMessages,
            'sentMessages' => $sentMessages]);
    }

    public function detail(Request $request)
    {
        $message = Message::where('id',$request->id)->first();

        if($message->receiver != Auth::user()->email && $message->sender != Auth::user()->email) {
            return redirect()->back()->with('error','You are not allowed to view this message');
        }

        return view('message.detail', [
            'message' => $message]);
    }


    public function store(Request $request)
    {
        try {
            //TODO handle this
            // $request->validate([
                // 'message' => ['required', 'string', 'max:255'],
            //     'sender' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //     'receiver' => ['required', 'string', 'confirmed'],
            // ]);

            Message::create([
                'message' => $request->message,
                'sender' => Auth::user()->email,
                'receiver' => $request->email,
                'read'=> '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->intended('message');

        } catch (\InvalidArgumentException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }

        return redirect()->back()->with('success','Message sent successfully!');
    }
}
