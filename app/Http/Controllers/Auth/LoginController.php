<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        if ( Auth()->attempt($request->only('email','password'))) {
            if (Auth()->user()->type == 'admin' )
            return redirect('dashboard');
            else return redirect(request('redirect_url') ? request('redirect_url') : '/site' );
        }else{
        return redirect()->back()->with('msg','invalid data please try again');
      }
    }
    public  function registerForm()
    {
        return view ('auth.register');
    }
    public function registerPost(Request $request)
    {
        $request->validate([
           'name' =>'required',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);
        $inputs = $request->all();
        $inputs['type'] = 'client';
        $user = User::create($inputs);
        auth()->loginUsingId($user->id);
        return redirect(request('redirect_url') ? request('redirect_url') : '/site' );
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/site');
    }


}
