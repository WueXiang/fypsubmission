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

    @foreach ($fyps as $fyp)
    <?php
    $fyp_id = $fyp->id;
    $fyppart1 = App\Fyppart::where("fyp_id", "=", $fyp->id)->where("part", "=", "1")->first();
    $fyppart2 = App\Fyppart::where("fyp_id", "=", $fyp->id)->where("part", "=", "2")->first();
    $student = App\User::where("id", "=", $fyp->student_id)->first();
    if ($student === null) {
        $student_name = "not available";
        $student_email = "";
    }
    else{
        $student_name = $student->name;
        $student_email = $student->email;
    }
    
    $report1 = App\Report::where("fyp_id", "=", $fyppart1->id)->get();
    if ($report1->count()< 1) {
        // $report_name = "not available";
        $report1_date = "not submitted";
    }
    else{
        // $report_name = $report->name;
        $report1_latest = $report1->last();
        $report1_date = $report1_latest->created_at;
    }
    $plagiarismreport1 = App\PlagiarismReport::where("fyp_id", "=", $fyppart1->id)->get();
    if ($plagiarismreport1->count()<1) {
        // $plagiarismreport_name = "not available";
        $plagiarismreport1_date = "not submitted";
    }
    else{
        // $plagiarismreport_name = $plagiarismreport->name;
        $plagiarismreport1_latest = $plagiarismreport1->last();
        $plagiarismreport1_date = $plagiarismreport1_latest->created_at;
    }
    $report2 = App\Report::where("fyp_id", "=", $fyppart2->id)->get();
    if ($report2->count()< 1) {
        // $report_name = "not available";
        $report2_date = "not submitted";
    }
    else{
        // $report_name = $report->name;
        $report2_latest = $report2->last();
        $report2_date = $report2_latest->created_at;
    }
    $plagiarismreport2 = App\PlagiarismReport::where("fyp_id", "=", $fyppart2->id)->get();
    if ($plagiarismreport2->count()<1) {
        // $plagiarismreport_name = "not available";
        $plagiarismreport2_date = "not submitted";
    }
    else{
        // $plagiarismreport_name = $plagiarismreport->name;
        $plagiarismreport2_latest = $plagiarismreport2->last();
        $plagiarismreport2_date = $plagiarismreport2_latest->created_at;
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
        <td>{{ $student_name}}<br>{{$student_email}}</td>
        <td>
            @if (($report1->count()< 1))
            <a class="btn btn-info">Interim Report</a><br>{{ $report1_date}}<br>
            @else
            <a class="btn btn-primary" href="/report_download/{{$fyppart1->id}}">Interim Report</a><br>{{ $report1_date}}<br>
            @endif
            @if (($report2->count()< 1))
            <a class="btn btn-info">Final Report</a><br>{{ $report2_date}}<br>
            @else
            <a class="btn btn-primary" href="/report_download/{{$fyppart2->id}}">Final Report</a><br>{{ $report2_date}}<br>
            @endif
        </td>
        <td>
            @if (($plagiarismreport1->count()< 1))
            <a class="btn btn-info">Phase 1</a><br>{{ $plagiarismreport1_date}}<br>
            @else
            <a class="btn btn-primary" href="/plagiarismreport_download/{{$fyppart1->id}}">Phase 1</a><br>{{ $plagiarismreport1_date}}<br>
            @endif
            @if (($plagiarismreport2->count()< 1))
            <a class="btn btn-info">Phase 2</a><br>{{ $plagiarismreport2_date}}<br>
            @else
            <a class="btn btn-primary" href="/plagiarismreport_download/{{$fyppart2->id}}">Phase 2</a><br>{{ $plagiarismreport2_date}}<br>
            @endif
        </td>

    </tr>

    @endforeach

    </table>

</div>
{{--     {!! $fypparts->links() !!} --}}

@endsection