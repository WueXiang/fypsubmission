<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            {!! Form::label('Student') !!}<br />
            {!! Form::select('student_id', $students, null, array('placeholder' => '----------------','class' => 'form-control')) !!}
        </div>
    </div>

    {!! Form::hidden('title_id', $title->id , null, array('placeholder' => '----------------','class' => 'form-control')) !!}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>