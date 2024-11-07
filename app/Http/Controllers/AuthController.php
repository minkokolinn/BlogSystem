<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        $userData=request()->validate([
            "name"=>["required","max:255","min:3"],
            "username"=>["required","max:255","min:3",Rule::unique("users","username")],
            "email"=>["required","email",Rule::unique("users","email")],
            "password"=>["required","min:8"]
        ]);
        
        $user=User::create($userData);

        auth()->login($user);

        // session()->flash("success","Welcome ".$user->name);

        return redirect('/')->with("success","Welcome ".$user->name);
    }

    public function logout(){
        auth()->logout();

        return redirect('/')->with("success","Good Bye!");
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login(){
        $formData=request()->validate([
            'email'=>['required','email','min:3','max:255',Rule::exists('users','email')],
            'password'=>['required','min:8','max:255']
        ],[
            'email.required'=>'We need your email address!!',
            'password.min'=>'Password should be more than eight characters!!!'
        ]);

        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin/blogs');
            }else{
                return redirect('/')->with("success","Welcome back!");
            }
            
        }else{
            return redirect()->back()->withErrors([
                "email"=>"User Credential Wrong!!!"
            ]);
        }
    }
}
