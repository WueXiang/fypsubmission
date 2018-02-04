@extends('layouts.app')
@section('content')
  
<?php
    $user = App\User::find(Auth::user()->id);
    $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
    $title = App\Title::where("id", "=", $fyp->title_id)->first();
    $supervisor = App\User::where("id", "=", $title->supervisor_id)->first();
    $moderator = App\User::where("id", "=", $title->moderator_id)->first();
    if ($moderator === null) {
        $moderator_name = "not available";
        $moderator_email = "";
    }
    else{
        $moderator_name = $moderator->name;
        $moderator_email = $moderator->email;
    }
    $co_supervisor = App\User::where("id", "=", $title->co_supervisor_id)->first();
    if ($co_supervisor === null) {
        $co_supervisor_name = "not available";
        $co_supervisor_email = "";
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Final Year Project no.{{$title->id}}</div>
                        <div class="title" style=" margin: 1cm;">
                          <p><label>Title</label><br>{{$title->title}}</p>
                          <p><label>Type</label><br>{{$title->type}}</p>
                          <p><label>Specialization</label><br>{{$title->specialization}}</p>
                          <p><label>Supervisor</label><br>{{$supervisor->name}}<br>{{$supervisor->email}}</p>
                          <p><label>Moderator</label><br>{{$moderator_name}}<br>{{$moderator_email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
{{--     <div class="container">
    <div class="row">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Title </h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('titles.index') }}"> Back</a>

            </div>

        </div>

    </div>
 --}}

{{--     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $title->title}}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Type:</strong>

                {{ $title->type}}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Specialization:</strong>

                {{ $title->specialization}}

            </div>

        </div>

    </div>
</div>
</div> --}}

@endsection