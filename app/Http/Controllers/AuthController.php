<?php

namespace App\Http\Controllers;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiants incorrects'
        ])->onlyInput('email');
    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Vous êtes maintenant déconnectés');
    }
}
