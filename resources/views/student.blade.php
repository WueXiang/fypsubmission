@extends('layouts.app')

@section('content')
<?php

use Carbon\Carbon;
  if (Auth::check()) {
    $user = App\User::find(Auth::user()->id);
    if ( empty($rollback) ){
      $rollback = '0';
    }
    $sem_one = App\Semester::where('part', '=', '1')->first();
    $sem_one_start = $sem_one->start_date;
    $sem_one_end = $sem_one->end_date;

    $sem_two = App\Semester::where('part', '=', '2')->first();
    $sem_two_start = $sem_two->start_date;
    $sem_two_end = $sem_two->end_date;

    $today = Carbon::today();
    if (($today>=$sem_one_start)&&($today<$sem_two_start)){
        $sem = '1';
        $sem_start=$sem_one_start;
        $sem_end=$sem_one_end;
        $date = new DateTime($sem_one_end);
        $now = new DateTime();
        $day_left=$date->diff($now)->format("%d days, %h hours and %i minutes");
    }
    else{
        $sem = '2';
        $sem_start=$sem_two_start;
        $sem_end=$sem_two_end;
        $date = new DateTime($sem_two_end);
        $now = new DateTime();
        $day_left=$date->diff($now)->format("%d days, %h hours and %i minutes");
        
        if ($rollback=='1'){
          $sem = '1';
        }
    }

    if ( App\Fyp::where("student_id", "=", $user->id)->count()>0){
      $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
      $fypparts = App\Fyppart::where("fyp_id", "=", $fyp->id)->get();
      $fyppart=$fypparts->where("part","=",$sem)->first();
      $title = App\Title::where("id", "=", $fyp->title_id)->first();
      $title_title = $title->title;
      $title_id = $title->id;
      if ( App\Meetinglog::where("fyp_id", "=", $fyppart->id)->count()>0){
        // echo (App\Meetinglog::where("fyp_id", "=", $fyppart->id)->exist());
        $meetinglog = App\Meetinglog::where("fyp_id", "=", $fyppart->id)->get();
        $meetinglog_count = $meetinglog->count();
      }
      else{
        $meetinglog_count = 0;
      }
      if ( App\Report::where("fyp_id", "=", $fyppart->id)->count()>0){
        // echo (App\Meetinglog::where("fyp_id", "=", $fyppart->id)->exist());
        $report = App\Report::where("fyp_id", "=", $fyppart->id)->get();
        $report_latest = $report->last();
        $report_date = $report_latest->created_at;
        $report_status = 'Last submission on '.$report_date.'';
      }
      else{
        $report_status = 'No submission yet';
      }
    }
    else{
      $title_title = '';
      $title_id = 'FYP title registered for this account yet.';
      $meetinglog_count = 0;
      $report_status = '';
    }

  }
  // else{
  //   return view('auth/login');
  // }

?>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<h1 style="padding-left:100px; font-size:50px;"><strong>No {{$title_id}}: {{$title_title}}</strong></h1>
<div>
  @if($rollback=='1')
  <a class="btn btn-default" href="{{route('present')}}" onclick="event.preventDefault();document.getElementById('present').submit();">
    <h2 style="padding-left:100px; color:grey; opacity:50;">FYP Phase {{$sem}} {{$sem_one_start}} until {{$sem_one_end}}</h2>
  </a>
  @elseif($rollback=='0')
  <a class="btn btn-default" href="{{route('rollback')}}" onclick="event.preventDefault();document.getElementById('rollback').submit();">
    <h2 style="padding-left:100px; color:grey; opacity:50;">FYP Phase {{$sem}} {{$sem_start}} until {{$sem_end}}</h2>
  </a>
  @endif
    
  <form id="present" action="{{ route('present') }}" method="GET" style="display: none;">{{ csrf_field() }}</form>
  <form id="rollback" action="{{ route('rollback') }}" method="GET" style="display: none;">{{ csrf_field() }}</form>
</div><br>
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    You are logged in as {{Auth::user()->name}} !
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
  <div class="row">
            @if( App\Fyp::where("student_id", "=", $user->id)->count()>0)
            <a href="student/title/show">
            @endif
              <div class="col-sm-4" style="background-color:#7b5eff;color:white; height:300px;">
                <h3><strong>Project Details</strong></h3>
                <p><br>Final Year Project no.{{$title_id}}<h4><strong>{{$title_title}}</strong></h4></p>
              </div>
            @if( App\Fyp::where("student_id", "=", $user->id)->count()>0)
            </a>
            @endif
            @if(( App\Fyp::where("student_id", "=", $user->id)->count()>0)&&($rollback == '0'))
            <a href ="student/meetinglog/">
            @endif
              <div class="col-sm-4" style="background-color:#ff3377;color:white; height:300px;">
                <h3><strong>Meeting Log</strong></h3>
                <p style="font-size: 30px;">{{$meetinglog_count}} out of 6 submitted</p>
                <p>Requirement minimum six meeting logs to be submitted</p>
              </div>
            @if( App\Fyp::where("student_id", "=", $user->id)->count()>0)
            </a>
            @endif
            @if(( App\Fyp::where("student_id", "=", $user->id)->count()>0)&&($rollback == '0'))
            <a href="{{route('reports.create',$fyppart->id)}}">
            @endif
                <div class="col-sm-4" style="background-color:#008f82;color:white;height:300px;">
                <h3><strong>Report</strong></h3>        
                <p style="font-size: 30px;">{{$report_status}}</p>
                @if($rollback == '0')        
                <p>Report submission duedate on week 12, {{$sem_end}}</p>
                <p>You have {{$day_left}} left.</p>
                @endif
              </div>
            @if( App\Fyp::where("student_id", "=", $user->id)->count()>0)
            </a>
            @endif
  </div>
</div>
@endsection
