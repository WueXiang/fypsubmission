@extends('layouts.app')
@section('content')

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
                }
            }
?>
    <div class="container">
        <div class="row">
            <h1>Submit a meeting log</h1>
            <form action="create" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('meeting_date') ? ' has-error' : '' }}">
                    <label for="meeting_date">Meeting Date</label>
                    <input type="date" class="form-control" id="meeting_date" name="meeting_date" placeholder="meeting date" value="{{ old('meeting_date') }}">
                    @if($errors->has('meeting_date'))
                        <span class="help-block">{{ $errors->first('meeting_date') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('work_done') ? ' has-error' : '' }}">
                    <label for="work_done">Work Done</label>
                    <textarea class="form-control" id="work_done" name="work_done" placeholder="work done">{{ old('work_done') }}</textarea>   @if($errors->has('work_done'))
                        <span class="help-block">{{ $errors->first('work_done') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('work_to_be_done') ? ' has-error' : '' }}">
                    <label for="work_to_be_done">Work To Be Done</label>
                    <textarea class="form-control" id="work_to_be_done" name="work_to_be_done" placeholder="work to be done">{{ old('work_to_be_done') }}</textarea>
                    @if($errors->has('work_to_be_done'))
                        <span class="help-block">{{ $errors->first('work_to_be_done') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('problem_encountered') ? ' has-error' : '' }}">
                    <label for="problem_encountered">Problem Encountered</label>
                    <textarea class="form-control" id="problem_encountered" name="problem_encountered" placeholder="problem encountered">{{ old('problem_encountered') }}</textarea>
                    @if($errors->has('problem_encountered'))
                        <span class="help-block">{{ $errors->first('problem_encountered') }}</span>
                    @endif
                </div>

                <input type="hidden" class="form-control" id="fyp_id" name="fyp_id" value={{$fyppart->id}}>
            
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection