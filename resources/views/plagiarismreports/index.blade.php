@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Proposed Project Title</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('titles.create') }}"> Create New Title</a>

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
            <th>Type</th>
            <th>Specialization</th>
            <th>Supervisor</th>
            <th>Co-supervisor</th>
            <th>Moderator</th>
            <th width="280px">Action</th>

        </tr>

    @foreach ($titles as $title)
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
    ?>
    <tr>

        <td>{{ $title->id }}</td>
        <td>{{ $title->title}}</td>
        <td>{{ $title->type}}</td>
        <td>{{ $title->specialization}}</td>
        <td>{{ $supervisor_name}}</td>
        <td>{{ $co_supervisor_name}}</td>
        <td>{{ $moderator_name}}</td>



        <td>

            <a class="btn btn-info" href="{{ route('titles.show',$title->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('titles.edit',$title->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['titles.destroy', $title->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>

</div>
{{--     {!! $titles->links() !!} --}}

@endsection