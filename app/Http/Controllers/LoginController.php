<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('depan.login.index', [
            'title' => 'Login'
        ]);
    }

    public function store(Request $request) {
        $result = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($result)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout() {
        Auth::logout();

        return redirect('/login');
    }
}
