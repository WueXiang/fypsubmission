@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Project Details</div>
                        <div class="meetinglog" style=" margin: 1cm;">
                          <p><label>Project ID</label><br>{{$project->id}}</p>
                          <p><label>Project Title</label><br>{{$project->title}}</p>
                          <p><label>Project Type</label><br>{{$project->project_type}}</p>
                          <p><label>Specialization</label><br>{{$project->specialization}}</p>
                          <p><label>Supervisor</label><br>{{$project->supervisor}}<br>{{$project->co_supervisor}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
@endsection