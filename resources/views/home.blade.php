@extends('layouts.app')

@section('content')
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

                    You are logged in as {{Auth::user()->name}}!

                    

                </div>
            </div>
        </div>
    </div>
</div>
<?php
  $user = App\User::find(Auth::user()->id);
  $project = App\Fyp::where("student_id", "=", $user->id)->get();
  $project = App\Fyp::select('title_id')->where("student_id", "=", $user->id)->get()->pluck('title_id');
  $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
  $fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first();
  $meetinglog = App\Meetinglog::where("fyp_id", "=", $fyppart->id)->get();
?>
<div class="container">
          <div class="row">
            <a href="/title/show">
              <div class="col-sm-4" style="background-color:#7b5eff;color:white; height:300px;">
                <h3>Project Details</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </a>
            <a href ="/meetinglog">
              <div class="col-sm-4" style="background-color:#ff3377;color:white; height:300px;">
                <h3>Meeting Log</h3>
                <p style="font-size: 30px;">{{$meetinglog->count()}} out of 6 submitted</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
              </div>
            </a>
            <a href="/upload">
              <div class="col-sm-4" style="background-color:#31e3fd;color:white;height:300px;">
              <h3>Report</h3>        
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
          </a>

          </div>
        </div>
@endsection
