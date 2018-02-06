@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>User Management</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

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
            <th>Name</th>
            <th>Email</th>
            <th>Specialization</th>
{{--             <th>Password</th> --}}
            <th>Student</th>
            <th>Lecturer</th>
            <th>Admin</th>
            <th width="280px">Action</th>

        </tr>

    @foreach ($users as $user)

    <tr>

        <td>{{ $user->id }}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->specialization}}</td>
{{--         <td>{{ $user->password}}</td> --}}
        <td>{{ $user->student}}</td>
        <td>{{ $user->lecturer}}</td>
        <td>{{ $user->admin}}</td>
        <td>

            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>

</div>
    {!! $users->links() !!}

@endsection