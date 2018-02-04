@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div {{-- class="col-md-8 col-md-offset-2" --}}>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as lecturer {{Auth::user()->name}}!
                </div>
            </div>
        </div>
    </div>
    <?php
    $user_id = Auth::id();
    ?>
    <div style="position:relative; left:50%; transform:translate(-50%,0);">
      <a href="lecturer/supervisor">
        <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align:center;background-color:#7b5eff;color:white;display:inline-block;min-height:350px">
          <h3><strong>Project Supervision</strong></h3>
        </div>
      </a>
      <a href ="lecturer/moderator">
        <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align:center;background-color:#ff3377;color:white;display:inline-block;min-height:350px">
          <h3><strong>Project Moderation</strong></h3>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
