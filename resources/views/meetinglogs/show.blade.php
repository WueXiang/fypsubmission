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
                                    $i=1
                                    ?>
                                     @foreach ($meetinglogs as $meetinglog)
                                      <tr>
                                          <td><a href="/index/{{$meetinglog->id}}"> {{$i++}} </a></td>
                                          <td><a href="/index/{{$meetinglog->id}}"> {{$meetinglog->meeting_date}} </a></td>
                                      </tr>
                                     @endforeach
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
@endsection