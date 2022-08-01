<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        
        // dd('store');
        // dd($request);
        // store user
        // sign the user in
        // redirect
        
    }
}
