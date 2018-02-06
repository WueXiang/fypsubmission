@extends('layouts.app')

@section('content')
<?php
  if (Auth::check()){
    $fyp_count = App\Fyp::count();
    if ($fyp_count>1){
      $fyp_count_status = ''.$fyp_count.' enrolled projects';
    }
    else{
      $fyp_count_status = ''.$fyp_count.' enrolled project';
    }

    $title_count = App\Title::count();
    if ($title_count>1){
      $title_count_status = ''.$title_count.' proposed project titles';
    }
    else{
      $title_count_status = ''.$title_count.' proposed project title';
    }

    $student_count = App\User::where('student', '=', '1')->count();
    if ($student_count>1){
      $student_count_status = ''.$student_count.' students registered';
    }
    else{
      $student_count_status = ''.$student_count.' student registered';
    }

    $pending_request_count = App\User::where('student', '=', '0')->where('lecturer', '=', '0')->where('admin', '=', '0')->count();
    if ($pending_request_count>1){
      $pending_request_count_status = ''.$pending_request_count.' pending requests';
    }
    else{
      $pending_request_count_status = ''.$pending_request_count.' pending request';
    }
  }

?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as {{Auth::user()->name}} !
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
  <div class="row">
            <a href="titles">
              <div class="col-sm-4" style="background-color:#7b5eff;color:white;text-align:center;height:300px;">
                <h3><strong>Projects Management</strong></h3><br>
                <p style="font-size: 20px;">{{$title_count_status}}</p>
                <p style="font-size: 20px;">{{$fyp_count_status}}</p>
              </div>
            </a>
            <a href ="users">
              <div class="col-sm-4" style="background-color:#ff3377;color:white;text-align:center;height:300px;">
                <h3><strong>User Management</strong></h3><br>
                <p style="font-size: 20px;">{{$student_count_status}}</p>
                <p style="font-size: 20px;">{{$pending_request_count_status}}</p>
              </div>
            </a>
            <a href="student/report">
              <div class="col-sm-4" style="background-color:#31e3fd;color:white;text-align:center;height:300px;">
              <h3><strong>Submission Management</strong></h3>        
              <p style="font-size: 20px;"></p>
              <p>Report submission duedate on week 12 </p>
            </div>
          </a>
  </div>
</div>
@endsection
