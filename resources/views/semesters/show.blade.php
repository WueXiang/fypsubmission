@extends('layouts.app')
@section('content')
  
<?php

    $supervisor = App\User::where("id", "=", $title->supervisor_id)->first();
    if ($supervisor === null) {
        $supervisor_name = "not available";
        $supervisor_email = "";
    }
    else{
        $supervisor_name = $supervisor->name;
        $supervisor_email = $supervisor->email;
    }
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
    else{
        $co_supervisor_name = $co_supervisor->name;
        $co_supervisor_email = $co_supervisor->email;
    }

    $fyps = App\Fyp::where('title_id', '=', $title->id)->get();
   
    // if ($fyps->count() > 0) {
    //     foreach ($fyps as $fyp){
    //         // exit($fyp[0]->student_id);
    //         $fyp_students = App\User::where("id", "=", $fyp->student_id)->first();
    //     }        
    // }
    // else{
    //     $fyp_students = 'not available';
    // }
?>
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <div class="container">
        <div class="row" style="display:flex;">
{{--             <div class="col-md-8 col-md-offset-2">
 --}}           <div class="panel panel-default" style="float:left; min-width:40% ">
                    <div class="panel-heading">Final Year Project no.{{$title->id}}</div>
                    <div class="title" style=" margin: 30px;">
                            <p><label>Title</label><br>{{$title->title}}</p>
                            <p><label>Type</label><br>{{$title->type}}</p>
                            <p><label>Specialization</label><br>{{$title->specialization}}</p>
                            <p><label>Supervisor</label><br>{{$supervisor_name}}<br>{{$supervisor_email}}</p>
                            <p><label>Moderator</label><br>{{$moderator_name}}<br>{{$moderator_email}}</p>
                    </div>
                </div>

                
                <div class="panel panel-default" style="float:left; width:30%; margin-left:20px; ">
                    <div class="panel-heading">Student</div>
                        <div class="form-group">

                            @if ($fyps->count() > 0)
                            
                            @foreach ($fyps as $fyp)
                            <?php
                                    // exit($fyp[0]->student_id);
                                    $fyp_student = App\User::where("id", "=", $fyp->student_id)->first();
                                    $fyp_student_id = $fyp_student->id;
                                    $fyp_student_name = $fyp_student->name;
                                    $id = $fyp->id;                                  
                            ?>
                            <a href="{{ route('fyps.show',$fyp->id) }}">
                            <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align:center;background-color:#7b5eff;color:white;display:inline-block;min-height:100px;min-width:300px;float:left;margin:25px;">
                              <h3><strong>{{$fyp_student_name}}</strong></h3>
                              <p>{{$fyp_student_id}}<br>{{$fyp_student->email}}</p>
                            </div></a>

                            @endforeach
                            @endif

                            @if ($fyps->count() < 2)
                            <div style="margin-left:25px;margin-right:25px; ">
                            {!! Form::model($fyps, ['method' => 'POST','route' => ['fyps.store']]) !!}
                            {!! Form::label('Enroll Student') !!}<br/>
                            {!! Form::select('student_id', $students, null, array('placeholder' => '----------------','class' => 'form-control')) !!}
                            {!! Form::hidden('title_id', $title->id , null, array('placeholder' => '----------------','class' => 'form-control')) !!}
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top:20px;">
                            <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                            {!! Form::close() !!}
                            @endif

                        </div>
                    </div>
                </div>
{{--             </div> --}}
        </div>        
    </div>

@endsection