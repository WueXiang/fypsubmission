@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Submitted Report</h2>

            </div>

{{--             <div class="pull-right">

                <a class="btn btn-success" href="{{ route('fypparts.create') }}"> Create New Report</a>

            </div> --}}

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered">

        <tr>

            <th>FYP ID</th>
            <th>Student</th>
            <th>Submission File</th>
            <th>Plagiarism Report</th>
{{--             <th>Co-supervisor</th>
            <th>Moderator</th> --}}
{{--             <th width="280px">Action</th> --}}

        </tr>

    @foreach ($fypparts as $fyppart)
    <?php
    $fyp = App\Fyp::where("id", "=", $fyppart->fyp_id)->first();
    if ($fyp === null) {
        $fyp_id = "not available";
        // $fyp_id = "";
    }
    else{
        $fyp_id = $fyp->id;
        // $fyp_email = $fyp->email;
    }
    $student = App\User::where("id", "=", $fyp->student_id)->first();
    if ($student === null) {
        $student_name = "not available";
        $student_email = "";
    }
    else{
        $student_name = $student->name;
        $student_email = $student->email;
    }
    
    $report = App\Report::where("fyp_id", "=", $fyppart->id)->get();
    if ($report->count()< 1) {
        // $report_name = "not available";
        $report_date = "not submitted";
    }
    else{
        // $report_name = $report->name;
        $report_latest = $report->last();
        $report_date = $report_latest->created_at;
    }
    $plagiarismreport = App\PlagiarismReport::where("fyp_id", "=", $fyppart->id)->get();
    if ($plagiarismreport->count()<1) {
        // $plagiarismreport_name = "not available";
        $plagiarismreport_date = "not submitted";
    }
    else{
        // $plagiarismreport_name = $plagiarismreport->name;
        $plagiarismreport_latest = $plagiarismreport->last();
        $plagiarismreport_date = $plagiarismreport_latest->created_at;
    }
    // $moderator = App\User::where("id", "=", $fyppart->moderator_id)->first();
    // if ($moderator === null) {
    //     $moderator_name = "not available";
    //     $moderator_email = "";
    // }
    // else{
    //     $moderator_name = $moderator->name;
    //     $moderator_email = $moderator->email;
    // }
    // $co_supervisor = App\User::where("id", "=", $fyppart->co_supervisor_id)->first();
    // if ($co_supervisor === null) {
    //     $co_supervisor_name = "not available";
    //     $co_supervisor_email = "";
    // }
    // else{
    //     $co_supervisor_name = $co_supervisor->name;
    //     $co_supervisor_email = $co_supervisor->email;
    // }   
    ?>
    <tr>

        <td>{{ $fyp->id }}</td>
        <td>{{ $student_name}}</td>
        <td>
            @if (($report->count()< 1))
            <a class="btn btn-info">Download</a><br>{{ $report_date}}</td>
            @else
            <a class="btn btn-primary" href="/report_download/{{$fyppart->id}}">Download</a><br>{{ $report_date}}
            @endif
        </td>
        <td>
            @if (($plagiarismreport->count()< 1))
            <a class="btn btn-info">Download</a><br>{{ $plagiarismreport_date}}</td>
            @else
            <a class="btn btn-primary" href="/plagiarismreport_download/{{$fyppart->id}}">Download</a><br>{{ $plagiarismreport_date}}
            @endif
        </td>

    </tr>

    @endforeach

    </table>

</div>
{{--     {!! $fypparts->links() !!} --}}

@endsection