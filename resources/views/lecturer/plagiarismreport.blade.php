@extends('layouts.app')
@section('content')

<html>
  <head>
    <title>File Upload</title>

{{--     <script type="text/javascript" src="{{ asset('js/vendor/dropzone.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" /> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <style>
      /* HTML5 display-role reset for older browsers */
      .dropzone {
          position: absolute;
/*          left: 50%;*/
/*          top: 50%;*/
/*          color: white;*/
/*          transform: translate(-50%,-50%);*/
      }

      .dropzone-btn{
          position: relative;
          background-color: white;
          padding: 8px 20px;
          border-radius: 10px;
          font-size: 20px;
          padding: 50px 100px;
          min-width: 500px;
          min-height: 200px;
      }

      .dropzone input[type=file] {
          position: absolute;
          left: 0;
          height: 80%;
          top: 0;
          opacity: 0;
          width: 100%;
          cursor: pointer;
      }

      .dropzone .submit{
          position: absolute;
          bottom: -40px;
          float:left;
/*          left: 50%;*/
/*          transform: translate(-50%,0);*/
          background: white;
          border-radius: 5px;
          font-size: 13px;
          padding: 5px;
      }
    </style>

    <meta http-equiv="refresh" content="100">
  </head>
  <body>
    <div class="container">
      <div class="content" style=" position:relative; float: left; min-width: 50%;">        
        <h1>File Upload</h1>
        <label>Select file to upload:</label>
        <div class="uploader" style=" position:absolute;">
          <div class = "wrapper" style="position:relative;float: left; min-width: 50%;">
            <form class="dropzone" action = "plagiarismreport/" method="POST" enctype="multipart/form-data">
{{--               <input type="hidden" name="_method" value="PUT"> --}}
              <button class="dropzone-btn">Upload a file</button>
              <input id = "dropzone-input" type="file" name="file" accept="application/pdf"/>

              <button class = "submit">Submit</button>
              <input type="hidden" value={{$fyppart->id}} name="fyppart_id">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
          </div>
          <script type="text/javascript">
            $('.dropzone #dropzone-input').change(function(){
              var filename = $('.dropzone #dropzone-input')[0].files[0].name;
              $('.dropzone .dropzone-btn').text(filename);
            });
          </script>
  
        </div>
      </div>
      <div class="content" style="position:relative; float: left; min-width: 50%;">
        <div><h4>Submitted file</h5>
        <?php
          echo '<iframe src= "plagiarismreports/'.$fyppart->id.'.pdf", width="100%" style="height:80vh"></iframe>';   
        ?>
        </div>
      </div>
    </div>
  </body>
</html>
@endsection