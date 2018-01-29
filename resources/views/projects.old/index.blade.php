@extends('layouts.app')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Laravel 5.5 CRUD Example from scratch</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Specialization</th>

            <th width="280px">Action</th>

        </tr>

    @foreach ($projects as $project)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $project->title}}</td>

        <td>{{ $project->specialization}}</td>

        <td>

            <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>


    {!! $projects->links() !!}

@endsection