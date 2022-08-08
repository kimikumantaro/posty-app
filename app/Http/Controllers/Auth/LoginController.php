<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']); //before routes lalu middleware dulu check whether user dah sign in or not
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email', // validation rules
            'password' => 'required', // validation ruless
        ]); // validate method(validate the request), throw exception if cannot validate
        // dd($request);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
