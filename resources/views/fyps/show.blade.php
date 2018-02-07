@extends('layouts.app')

@section('content')
<?php
  if (Auth::check()) {
      // $fyp = App\Fyppart::where("id", "=", $fyp_id)->first();
      $fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first();//part1 only
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
      if ( App\PlagiarismReport::where("fyp_id", "=", $fyppart->id)->count()>0){
        // echo (App\Meetinglog::where("fyp_id", "=", $fyppart->id)->exist());
        $plagiarismreport = App\PlagiarismReport::where("fyp_id", "=", $fyppart->id)->get();
        $plagiarismreport_latest = $plagiarismreport->last();
        $plagiarismreport_date = $plagiarismreport_latest->created_at;
        $plagiarismreport_status = 'Last submission on '.$plagiarismreport_date.'';
      }
      else{
        $plagiarismreport_status = 'No submission yet';
      }
  }
  else{
    return view('auth/login');
  }
?>

<h1 style="padding-left:100px">No {{$title_id}} {{$title_title}}</h1><br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


<div class="container">
  <div class="row">
      @if (App\Meetinglog::where("fyp_id", "=", $fyppart->id)->count()>0)
      <a href ="{{ route('meetinglogs.show',$fyppart->id) }}">
      @endif
              <div class="col-sm-4" style="background-color:#ff3377;color:white; height:300px;">
                <h3><strong>Meeting Log</strong></h3>
                <p style="font-size: 30px;">{{$meetinglog_count}} out of 6 submitted</p>
                <p>Requirement minimum six meeting logs to be submitted</p>
              </div>
      @if (App\Meetinglog::where("fyp_id", "=", $fyppart->id)->count()>0)
      </a>
      @endif
      @if (App\Report::where("fyp_id", "=", $fyppart->id)->count()>0)
      <a href="/report/{{$fyppart->id}}">
      @endif
              <div class="col-sm-4" style="background-color:#31e3fd;color:white;height:300px;">
                <h3><strong>Report</strong></h3>        
                <p style="font-size: 30px;">{{$report_status}}</p>
                <p>Report submission duedate on week 12 </p>
              </div>
      @if (App\Report::where("fyp_id", "=", $fyppart->id)->count()>0)
      </a>
      @endif
      @if (App\Report::where("fyp_id", "=", $fyppart->id)->count()>0)
      <a href="/plagiarismreport/{{$fyppart->id}}">
      @endif
              <div class="col-sm-4" style="background-color:#7b5eff;color:white; height:300px;">
                <h3><strong>PlagiarismReport</strong></h3>        
                <p style="font-size: 30px;">{{$plagiarismreport_status}}</p>
                <p>Report submission duedate on week 13 </p>
              </div>
      @if (App\Report::where("fyp_id", "=", $fyppart->id)->count()>0)
      </a>
      @endif
  </div>
</div>
@endsection
