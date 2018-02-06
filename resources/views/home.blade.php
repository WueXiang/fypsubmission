@extends('layouts.app')

@section('content')
@if (Auth::check())
  @if ((Auth::user()->student == '0')&&( Auth::user()->lecturer == '0')&&( Auth::user()->admin == '0'))
    <br><h1>Your request is pending, please wait for approval from adminstrative.</h1>          
  @endif
@endif

{{-- <div class="container">  
          <div class="row">
            <div class="col-sm">
              <h3>Login as:</h3>
            </div>
          </div>
          <div class="row">
            <a href="/student" class="col-sm-2" style="background-color:#7b5eff;color:white;">
              <h3>Student</h3>
            </a>
          </div>
          <div class="row">
            <a href="/lecturer" class="col-sm-2" style="background-color:#ff3377;color:white;">
              <h3>Lecturer</h3>
            </a>
          </div>
          <div class="row">
            <a href="/admin" class="col-sm-2" style="background-color:#31e3fd;color:white;">
              <h3>Admin</h3>
            </a>
          </div>
        </div> --}}
@endsection