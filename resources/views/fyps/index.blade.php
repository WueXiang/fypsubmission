@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Enrolled Project</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('fyps.create') }}"> Enroll Student</a>

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

            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Specialization</th>
            <th>Student</th>
{{--             <th>Supervisor</th>
            <th>Co-supervisor</th>
            <th>Moderator</th> --}}
            <th width="280px">Action</th>

        </tr>

    @foreach ($fyps as $fyp)
    <?php
    $title = App\Title::where("id", "=", $fyp->title_id)->first();
    $student = App\User::where("id", "=", $fyp->student_id)->first();
    if ($student === null) {
        $student_name = "not available";
        $student_email = "";
    }
    else{
        $student_name = $student->name;
        $student_email = $student->email;
    }
    $supervisor = App\User::where("id", "=", $fyp->supervisor_id)->first();
    if ($supervisor === null) {
        $supervisor_name = "not available";
        $supervisor_email = "";
    }
    else{
        $supervisor_name = $supervisor->name;
        $supervisor_email = $supervisor->email;
    }
    $moderator = App\User::where("id", "=", $fyp->moderator_id)->first();
    if ($moderator === null) {
        $moderator_name = "not available";
        $moderator_email = "";
    }
    else{
        $moderator_name = $moderator->name;
        $moderator_email = $moderator->email;
    }
    $co_supervisor = App\User::where("id", "=", $fyp->co_supervisor_id)->first();
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

        <td>{{ $fyp->id }}</td>
        <td>{{ $title->title}}</td>
        <td>{{ $title->type}}</td>
        <td>{{ $title->specialization}}</td>
        <td>{{ $student_name}}</td>
{{--         <td>{{ $supervisor_name}}</td>
        <td>{{ $co_supervisor_name}}</td>
        <td>{{ $moderator_name}}</td> --}}



        <td>

            <a class="btn btn-info" href="{{ route('fyps.show',$fyp->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('fyps.edit',$fyp->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['fyps.destroy', $fyp->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>

</div>
{{--     {!! $fyps->links() !!} --}}

@endsection