@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Project Details</div>
                        <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Project</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Date:</strong>

                {{ $project->id}}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Body:</strong>

                {{ $project->title}}

            </div>

        </div>

    </div>
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