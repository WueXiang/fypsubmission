@extends('layouts.app')
@section('content')

<html>
  <head>
    <title>File Upload</title>

    <script type="text/javascript" src="{{ asset('js/vendor/dropzone.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" />

    <style>

    </style>
  </head>
  <?php
    $user = App\User::find(Auth::user()->id);
    $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
    $fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first();
  ?>
  <body>
    <div class="container">
      <div class="content" style=" position:relative; float: left; min-width: 50%;">        
        <h1>File Upload</h1>
        <label>Select file to upload:</label>
        <div class="uploader" style=" position:absolute;">
          <span>
            <form action="{{ URL::to('new_report')}}" class="dropzone" id="my-awesome-dropzone" method="post" enctype="multipart/form-data" type="file" name="file" style="width:500px; height:45%;">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
          </span>
          <span>
            <form action="new_report" method="post" enctype="multipart/form-data">
              <input type="file" name="file" id="file"><br>
              <input type="checkbox" name="signature" value="Bike" required> I agree that this submission file will be taken as final submission if no more submission after this before duedate. <br>
              <input type="submit" value="Upload" name="submit">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
          </span>            
        </div>
      </div>
      <div class="content" style="position:relative; float: left; min-width: 50%;">
        <div><h4>Submitted file</h5>
        <?php
          echo '<iframe src= "reports/'.$fyppart->id.'.pdf", width="100%" style="height:80vh"></iframe>';   
        ?>
        </div>
      </div>
    </div>
  </body>
</html>
@endsection