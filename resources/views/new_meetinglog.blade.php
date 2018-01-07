@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Submit a meeting log</h1>
            <form action="/new_meetinglog" method="post">
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
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection