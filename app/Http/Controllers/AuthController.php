<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Facade;

class AuthController extends Controller
{
    public function signUp() {
        return view('pages.auth.signup');
    }

    public function signIn() {
        return view('pages.auth.signin');
    }

    public function storeUser(Request $request)
    { 
        $validate_request = $request->validate([
            'name'=>'required',
            'email'=>'required | email',
            'password'=>'required | min:6',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            return back()->withErrors([
                'email' => 'The provided email is already registered.',
            ])->withInput();
        }

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        User::create($validate_request);

        return redirect()->route('auth.signin');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (FacadesAuth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('feeds');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        FacadesAuth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.signin');
    }
}
