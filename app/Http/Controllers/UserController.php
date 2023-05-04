<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Loginindex(){

        if(Auth::check()){

            return redirect('/');
        }
        else{
            return view('user.login');
        }
    }

    public function Registerindex(){

        if(Auth::check()){

            return redirect('/');
        }
        else{
            return view('user.register');
        }

    }

    public function store(Request $request){

        $formFields = $request->validate([
            "name"=> "required",
            "email"=>['required', 'email', Rule::unique('users', 'email')],
            "password"=>"required"
        ]);

        $formFields["password"] = bcrypt(request()->get("password"));

        User::create($formFields);

        return redirect("/login")->with('message', 'User created');
    }

        // Logout User
        public function logout(Request $request) {
            auth()->logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return redirect('/')->with('message', 'You have been logged out!');
    
        }

    public function authenticate(Request $request){

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


    
}
