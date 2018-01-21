@extends('layouts.app')
@section('content')

<html>
  <head>
    <title>File Upload</title>

    <script type="text/javascript" src="{{ asset('js/vendor/dropzone.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" />

    <style>
      
      .uploader{
        width: 40% !important;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div class="content">
        
        <h1>File Upload</h1>
        <label>Select file to upload:</label>
        <div class="uploader">
          <span>
            <form action="{{ URL::to('upload')}}" class="dropzone" id="my-awesome-dropzone" method="post" enctype="multipart/form-data" type="file" name="file" style="width:500px; height:45%;">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
          </span>
          <span>
            <form action="{{ URL::to('upload') }}" method="post" enctype="multipart/form-data">
              <input type="file" name="file" id="file">
              <input type="checkbox" name="signature" value="Bike" required> I agree that this submission file will be taken as final submission if no more submission after this before duedate. <br>
              <input type="submit" value="Upload" name="submit">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">

            </form>
          </span>            
        </div>

      </div>
    </div>
  </body>
</html>
@endsection