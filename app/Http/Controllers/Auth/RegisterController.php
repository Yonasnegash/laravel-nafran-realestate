<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // validate user

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            // 'password' => 'required|confirmed',
        ]);

        // store user

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // sign in user

        auth()->attempt($request->only('email', 'password'));

        // redirect user

        return redirect()->route('dashboard');
    }
}
