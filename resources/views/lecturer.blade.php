@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as lecturer!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
          <div class="row">
            <div class="col-sm-4">
              <h3>Project Details</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <form action="/projects">
                <input type="submit" value="Open" />
            </form>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
              <h3>Meeting Log</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <form action="/meetinglog">
                <input type="submit" value="Open" />
                </form>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
              <h3>Report</h3>        
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
              <form action="/upload">
                <input type="submit" value="Open" />
                </form>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
          </div>
        </div>
@endsection
