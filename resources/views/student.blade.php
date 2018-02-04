@extends('layouts.app')

@section('content')
<?php
  if (Auth::check()) {
    $user = App\User::find(Auth::user()->id);
    // $project = App\Fyp::where("student_id", "=", $user->id)->get();
    // $project_id = App\Fyp::select('title_id')->where("student_id", "=", $user->id)->get()->pluck('title_id'); 
    if ( App\Fyp::where("student_id", "=", $user->id)->count()>0){
      $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
      $fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first();
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

<h1 style="padding-left:100px">No {{$title_id}} {{$title_title}}</h1>
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
            <a href="student/title/show">
              <div class="col-sm-4" style="background-color:#7b5eff;color:white; height:300px;">
                <h3><strong>Project Details</strong></h3>
                <p><br>Final Year Project no.{{$title_id}}<h4><strong>{{$title_title}}</strong></h4></p>
              </div>
            </a>
            <a href ="student/meetinglog">
              <div class="col-sm-4" style="background-color:#ff3377;color:white; height:300px;">
                <h3><strong>Meeting Log</strong></h3>
                <p style="font-size: 30px;">{{$meetinglog_count}} out of 6 submitted</p>
                <p>Requirement minimum six meeting logs to be submitted</p>
              </div>
            </a>
            <a href="student/report">
              <div class="col-sm-4" style="background-color:#31e3fd;color:white;height:300px;">
              <h3><strong>Report</strong></h3>        
              <p style="font-size: 30px;">{{$report_status}}</p>
              <p>Report submission duedate on week 12 </p>
            </div>
          </a>
  </div>
</div>
@endsection
