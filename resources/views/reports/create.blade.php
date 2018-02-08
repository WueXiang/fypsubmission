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

{{--     <meta http-equiv="refresh" content="60"> --}}
  </head>
  <?php
    use Carbon\Carbon;

    if ( empty($rollback) ){
      $rollback = '0';
    }
    $sem_one = App\Semester::where('part', '=', '1')->first();
    $sem_one_start = $sem_one->start_date;
    $sem_one_end = $sem_one->end_date;

    $sem_two = App\Semester::where('part', '=', '2')->first();
    $sem_two_start = $sem_two->start_date;
    $sem_two_end = $sem_two->end_date;

    $today = Carbon::today();
    if (($today>=$sem_one_start)&&($today<$sem_two_start)){
        $sem = '1';
        $sem_start=$sem_one_start;
        $sem_end=$sem_one_end;
        $date = new DateTime($sem_one_end);
        $now = new DateTime();
        $day_left=$date->diff($now)->format("%d days, %h hours and %i minutes");
    }
    else{
        $sem = '2';
        $sem_start=$sem_two_start;
        $sem_end=$sem_two_end;
        $date = new DateTime($sem_two_end);
        $now = new DateTime();
        $day_left=$date->diff($now)->format("%d days, %h hours and %i minutes");
        
        if ($rollback=='1'){
          $sem = '1';
        }
    }
    $fyp = App\Fyp::where("student_id", "=", Auth::id())->first();
    $fypparts = App\Fyppart::where("fyp_id", "=", $fyp->id)->get();
    $fyppart=$fypparts->where("part","=",$sem)->first();
  ?>
  <body>
    <div class="container">
      <div class="content" style=" position:relative; float: left; min-width: 50%;">        
        <h1>File Upload</h1>
        <label>Select file to upload:</label>
        <div class="uploader" style=" position:absolute;">
          <div class = "wrapper" style="position:relative;float: left; min-width: 50%;max-width: 50%;">
            <form class="dropzone" action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
              <button class="dropzone-btn">Upload a file</button>
              <input id = "dropzone-input" type="file" name="file" accept="application/pdf"/>

              <button onclick="reloadDoc()" class = "submit">Submit</button>
              <input type="checkbox" name="signature" required> I agree that this submission file will be taken as final submission if no more submission after this before duedate.<br>
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
              <input type="hidden" value= {{$fyppart->id}} name="fyppart_id">
            </form>
          </div>
          <script type="text/javascript">
            $('.dropzone #dropzone-input').change(function(){
              var filename = $('.dropzone #dropzone-input')[0].files[0].name;
              $('.dropzone .dropzone-btn').text(filename);
            });

            function reloadDoc() {
                document.getElementsByTagName('iframe')[0].src=document.getElementsByTagName('iframe')[0].src
            }
          </script>
                  {{-- <span>
            <form action='new_report' class="dropzone" id="my-awesome-dropzone" method="post" enctype="multipart/form-data" style="width:500px; height:45%;">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
          </span>
          <span>
            <form action="new_report" method="post" enctype="multipart/form-data">
              <input type="file" name="file" id="file"><br>
              <input type="checkbox" name="signature" required> I agree that this submission file will be taken as final submission if no more submission after this before duedate. <br>
              <input type="submit" value="Upload" name="submit">
              <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>
          </span>  --}}           
        </div>
      </div>
      <div class="content" style="position:relative; float: left; min-width: 50%;">
        <div><h4>Submitted file</h5>
        <?php
          echo '<iframe src= "/'.$fyppart->id.'report.pdf", width="100%" style="height:80vh"></iframe>';   
        ?>
        </div>
      </div>
    </div>
  </body>
</html>
@endsection