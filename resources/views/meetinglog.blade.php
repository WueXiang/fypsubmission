@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
                {{-- <div class="title m-b-md">
                    Meeting Log
                </div> --}}
                <h1>Meeting Log</h1>
                <div class="meetinglog">
                    @foreach ($meetinglog as $meetinglog)
                        <a href="{{ $meetinglog->date }}">{{ $meetinglog->meeting_log_id }}</a>
                        <a href="{{ $meetinglog->date }}">{{ $meetinglog->meeting_date }}</a>
                        <br>
                    @endforeach

                    {{-- <table>
                        <thead>
                            <tr>
                                <th> Meeting ID</th>
                                <th> Meeting date</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($meetinglog as $meetinglog)
                              <tr>
                                  <td> {{$meetinglog->id }} </td>
                                  <td> {{$meetinglog->date}} </td>
                              </tr>
                             @endforeach
                       </tbody>
                    </table> --}}

                    <form action="new_meetinglog">
                        <input type="submit" value="New Submission" />
                    </form>
                </div>
            </div>
        </div>
        
    </body>

</html>
@endsection