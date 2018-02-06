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
                                        <th> ID</th>
                                        <th> Meeting date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user = App\User::find(Auth::user()->id);
                                    $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
                                    $fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first();
                                    $meetinglog = App\Meetinglog::where("fyp_id", "=", $fyppart->id)->get();
                                    ?>
                                     @foreach ($meetinglog as $item)
                                      <tr>
                                          <td><a href="meetinglog/index/{{$item->id}}"> {{$item->id }} </a></td>
                                          <td><a href="meetinglog/index/{{$item->id}}"> {{$item->meeting_date}} </a></td>
                                      </tr>
                                     @endforeach
                               </tbody>
                            </table>
                            <form action="meetinglog/create">
                                <input type="submit" value="New Submission" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
@endsection