<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LecturerLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:lecturer', ['except' => ['logout']]);
	}
    public function showLoginForm()
    {
    	return view('auth.lecturerlogin');
    }
    public function login(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	if( Auth::guard('lecturer')->attempt(['email'=> $request -> email, 'password'=> $request -> password], $request -> remember)){
    		return redirect()->intended(route('lecturer.dashboard'));
    	}
    	return redirect()->back()->withInput($request->only('email','remember'));
    }
}
