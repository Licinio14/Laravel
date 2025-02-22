<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControler extends Controller
{
    public function addUser(){
        return view('auth.register');
    }

    public function createUser(Request $request){

        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pd),
            'created_at' => now()
        ]);

        return redirect()->route('home')->with('message','Conta criada com sucesso');

    }
}
