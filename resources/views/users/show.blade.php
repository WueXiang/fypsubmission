@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Details</div>
                        <div class="user" style=" margin: 1cm;">
                          <p><label>ID</label><br>{{$user->id}}</p>
                          <p><label>Name</label><br>{{$user->name}}</p>
                          <p><label>Email</label><br>{{$user->email}}</p>
                          <p><label>Password</label><br>{{$user->password}}<br></p>
                          @if ($user->student=='1')
                          <p><label>Specialization</label><br>{{$user->specialization}}<br></p>
                          @endif
                          
                          <p><label>Access level</label><br>
                            @if ($user->student=='1') Student
                            @elseif ($user->lecturer=='1') Lecturer
                            @elseif ($user->admin=='1') Admin
                            @endif </p>
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

                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

            </div>

        </div>

    </div>
 --}}

{{--     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $user->user}}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Type:</strong>

                {{ $user->type}}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Specialization:</strong>

                {{ $user->specialization}}

            </div>

        </div>

    </div>
</div>
</div> --}}

@endsection