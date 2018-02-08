@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div {{-- class="col-lg-2 margin-tb" --}}>

            <div class="pull-left">

                <h2>Edit Phase {{$semester->part}} Period</h2>

            </div>

            <div style="float:right">

                <a class="btn btn-primary" href="/home"> Back</a>

            </div>

        </div>

    </div>


    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {!! Form::model($semester, ['method' => 'PATCH','route' => ['semesters.update', $semester->id]]) !!}

        @include('semesters.form')

    {!! Form::close() !!}

</div>
@endsection