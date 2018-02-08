<div class="row">

{{--     <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>FYP Part:</strong>
            {!! Form::hidden('part', ['1' => '1', '2' => '2'], null, array('placeholder' => 'Part','class' => 'form-control')) !!}

        </div>
    </div> --}}
    
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Start Date:</strong>
            {!! Form::date('start_date', null, array('placeholder' => '','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>End Date:</strong>
            {!! Form::date('end_date', null, array('placeholder' => '','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>