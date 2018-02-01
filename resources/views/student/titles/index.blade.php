@extends('layouts.app')


@section('content')

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
            <th width="280px">Action</th>

        </tr>

    @foreach ($titles as $title)

    <tr>

        <td>{{ ++$i }}</td>
        <td>{{ $title->title}}</td>
        <td>{{ $title->type}}</td>
        <td>{{ $title->specialization}}</td>
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


    {!! $titles->links() !!}

@endsection