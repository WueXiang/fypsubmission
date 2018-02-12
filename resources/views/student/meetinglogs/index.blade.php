@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <div class="panel panel-default">
                    
                    <div class="panel-heading">Meeting Log</div>
                        <div class="meetinglog">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th> No</th>
                                        <th> Meeting date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    use Carbon\Carbon;
  if (Auth::check()) {
    $user = App\User::find(Auth::user()->id);
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

    if ( App\Fyp::where("student_id", "=", $user->id)->count()>0){
      $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
      $fypparts = App\Fyppart::where("fyp_id", "=", $fyp->id)->get();
      $fyppart=$fypparts->where("part","=",$sem)->first();
                                    $meetinglog = App\Meetinglog::where("fyp_id", "=", $fyppart->id)->get();
                                    $i=1;
                                }
                            }
                                    ?>
                                     @foreach ($meetinglog as $item)
                                     
                                      <tr>
                                          <td><a href="meetinglog/index/{{$item->id}}"> {{$i++}} </a></td>
                                          <td><a href="meetinglog/index/{{$item->id}}"> {{$item->meeting_date}} </a></td>
                                      </tr>
                                     @endforeach
                               </tbody>
                            </table>
                            <form action="meetinglog/create" style="position:relative;" class="pull-right">
                                <input type="submit" value="New Submission" class="btn btn-info"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
@endsection