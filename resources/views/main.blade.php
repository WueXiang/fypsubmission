@extends('layouts.app')

@section('content')

<div class="container">
          <div class="row">
            <div class="col-sm">
              <h3>Login as:</h3>
            </div>
          </div>
          <div class="row">
            <a href="/home" class="col-sm-2" style="background-color:#7b5eff;color:white;">
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
        </div>
@endsection
