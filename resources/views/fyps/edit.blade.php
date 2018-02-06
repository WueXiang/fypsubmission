@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div {{-- class="col-lg-2 margin-tb" --}}>

            <div class="pull-left">

                <h2>Edit Fyp</h2>

            </div>

            <div style="float:right">

                <a class="btn btn-primary" href="{{ route('fyps.index') }}"> Back</a>

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


    {!! Form::model($fyp, ['method' => 'PATCH','route' => ['fyps.update', $fyp->id]]) !!}

        @include('fyps.form')

    {!! Form::close() !!}

</div>
@endsection