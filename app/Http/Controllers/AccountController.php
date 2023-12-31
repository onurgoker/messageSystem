<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::where('email', '!=', Auth::user()->email)->get();

        return view('account.index', ['users' => $users]);
    }

    public function auth(Request $request)
    {
        try {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('message');
        }
        } catch (\InvalidArgumentException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'firstName' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
            ]);

            User::create([
                'name' => $request->firstName . ' ' . $request->lastName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } catch (\InvalidArgumentException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }

        return redirect()->back()->with('success','Registration completed');
    }

    public function login(Request $request) {
        return view('account.login');
    }
}
