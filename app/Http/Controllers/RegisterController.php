<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('depan.register.index',[
            'title' => 'Register',
        ]);
    }

    public function store(Request $request) {
        $result = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:3|max:255',
            'password' => 'required|min:5',
            'level' => 'required',
        ]);

        $result['password'] = Hash::make($result['password']);

        User::create($result);

        return redirect('/login')->with('success', 'Registration Successfully');
    }
}
