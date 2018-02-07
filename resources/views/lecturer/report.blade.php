@extends('layouts.app')
@section('content')

  <head>
    <meta http-equiv="refresh" content="100">
  </head>
  <body>
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
    <div class="container" style="display:flex;max-height:80%;">     
        <div class="panel panel-default" style="float:left; min-width: 50%;">
            <div class="panel-heading">Submitted File</div>
            <?php
              echo '<iframe src= "/'.$fyppart->id.'report.pdf", width="100%" style="height:75vh"></iframe>';   
            ?>
        </div>

        <div class="panel panel-default" style="float:left; width:30%; margin-left:20px;">
          <div class="panel-heading">Comment</div>
          <div class="form-group" style="padding:1cm;">
            {!! Form::model($report, ['method' => 'PATCH','route' => ['reports.update',$report->id]]) !!}
            {!! Form::textarea('comment', null, array('placeholder' => 'leave your comment here','class' => 'form-control')) !!}
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top:20px">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>
  </body>
@endsection