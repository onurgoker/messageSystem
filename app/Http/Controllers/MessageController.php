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
        $messages = Message::where('email', '!=', Auth::user()->email)->get();

        return view('message.index', ['messages' => $messages]);
    }

    public function store(Request $request)
    {
        try {
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
