<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          if (Auth::check()) {
            if (( Auth::user()->student == '0')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '1')){
              return view('admin');
            }
            elseif (( Auth::user()->student == '0')&&( Auth::user()->lecturer == '1')&&( Auth::user()->admin == '0')){
              return view('lecturer');
            }
            elseif (( Auth::user()->student == '1')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '0')){
              return view('student');
            }
            else{
              // return view('home');
              return view('auth/login');
            }
          }
          else{
            return view('auth/login');
          }
    }
    public function rollback()
    {

          if (Auth::check()) {
            if (( Auth::user()->student == '0')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '1')){
              return view('admin');
            }
            elseif (( Auth::user()->student == '0')&&( Auth::user()->lecturer == '1')&&( Auth::user()->admin == '0')){
              $rollback[0]='1';
              return redirect()->back()->withInput(compact($rollback[0]));
            }
            elseif (( Auth::user()->student == '1')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '0')){
              $rollback='1';
              return view('student')->with('rollback',$rollback);
            }
            else{
              return view('home');
            }
          }
          else{
            return view('auth/login');
          }
    }

    public function present()
    {

          if (Auth::check()) {
            if (( Auth::user()->student == '0')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '1')){
              return view('admin');
            }
            elseif (( Auth::user()->student == '0')&&( Auth::user()->lecturer == '1')&&( Auth::user()->admin == '0')){
              $rollback='0';
              return redirect()->back()->with('rollback',$rollback);
            }
            elseif (( Auth::user()->student == '1')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '0')){
              $rollback='0';
              return view('student')->with('rollback',$rollback);
            }
            else{
              // return view('home');
              return view('auth/login');
            }
          }
          else{
            return view('auth/login');
          }
    }
}
