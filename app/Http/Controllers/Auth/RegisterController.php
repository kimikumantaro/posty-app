<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request) // Request object
    {

        //validation
        $this->validate($request, [
            'name' => 'required|max:255 ', // validation rules
            'username' => 'required|max:255 ', // validation rules
            'email' => 'required|email|max:255 ', // validation rules
            'password' => 'required|confirmed ', // validation rules (it will look for _confirmation in the blade template)
        ]); // validate method(validate the request), throw exception if cannot validate
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //sign in

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard'); //chain route
        
        // dd($request);
        // store user
        // redirect
        
    }
}
