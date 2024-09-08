<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function LoginPage()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === 'admin' && $request->password === '215314211') {
            Session::put('user', $request->username);
            return redirect()->route('todos.index'); 
        }

        return back()->withErrors(['Login failed! Incorrect username or password.']);
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login');
    }
}
