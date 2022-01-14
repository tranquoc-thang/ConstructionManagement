<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $rules = [
            'email' =>'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'You need to enter Email',
            'email.email' => 'Email invalidate',
            'password.required' => 'You need to enter Pass Word',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    	$validator->validate();

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        } else {
            return redirect()->route('login')->with('fail', 'Incorrect email or password!');
        }
    }
}
