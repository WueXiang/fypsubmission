@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Meeting Log no.{{$meetinglog->id}}</div>
                        <div class="meetinglog" style=" margin: 1cm;">
                          <p><label>Meeting Date</label><br>{{$meetinglog->meeting_date}}</p>
                          <p><label>Work Done</label><br>{{$meetinglog->work_done}}</p>
                          <p><label>Work To Be Done</label><br>{{$meetinglog->work_to_be_done}}</p>
                          <p><label>Problem Encountered</label><br>{{$meetinglog->problem_encountered}}</p>
                          <p><label>Comment</label><br>{{$meetinglog->comment}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection