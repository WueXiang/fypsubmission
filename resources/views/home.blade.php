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

                    {{$user = App\User::find(Auth::user()->id)}}
                    {{$project = App\Fyp::where("student_id", "=", $user->id)->get()}}<br>
                    {{$project = App\Fyp::select('title_id')->where("student_id", "=", $user->id)->get()->pluck('title_id')}}
                                    {{$fyp = App\Fyp::where("student_id", "=", $user->id)->first()}}
                                    {{$fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first()}}
                                    {{$meetinglog = App\Meetinglog::where("fyp_id", "=", $fyppart->id)->get()}}


                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
          <div class="row">
            <div class="col-sm-4" style="background-color:#7b5eff;color:white;">
              <h3>Project Details</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <a href="/project/detail/">
                <input type="submit" value="Open"/>
              </a>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4" style="background-color:#ff3377;color:white;">
              <h3>Meeting Log</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <a href ="/meetinglog">
                <input type="submit" value="Open" />
              </a>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4" style="background-color:#31e3fd;color:white;">
              <h3>Report</h3>        
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <form action="/upload">
                <input type="submit" value="Open" />
                </form>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
          </div>
        </div>
@endsection
