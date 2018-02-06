@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

@endif
  <div class="container">
        <div class="row">
            <div style="display:flex;height:90%"{{-- class="col-md-8 col-md-offset-2" --}} >
                <div class="panel panel-default" style="float:left; width:40%">
                    <div class="panel-heading">Meeting Log no.{{$meetinglog->id}}</div>
                    <div class="meetinglog" style=" margin: 1cm;">
                          <p><label>Meeting Date</label><br>{{$meetinglog->meeting_date}}</p>
                          <p><label>Work Done</label><br>{{$meetinglog->work_done}}</p>
                          <p><label>Work To Be Done</label><br>{{$meetinglog->work_to_be_done}}</p>
                          <p><label>Problem Encountered</label><br>{{$meetinglog->problem_encountered}}</p>
                          <p><label>Comment</label><br>{{$meetinglog->comment}}</p>
                    </div>
                </div>

                
                <div class="panel panel-default" style="float:left; width:30%; margin-left:20px;">
                    <div class="panel-heading">Comment</div>
                    <div class="form-group" style="padding:1cm;">
                      {!! Form::model($meetinglog, ['method' => 'PATCH','route' => ['meetinglogs.update',$meetinglog->id]]) !!}
                      {!! Form::textarea('comment', null, array('placeholder' => 'leave your comment here','class' => 'form-control')) !!}
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top:20px">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                      {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection