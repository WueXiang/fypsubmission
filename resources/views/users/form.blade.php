<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>ID:</strong>
            {!! Form::text('id', null, array('placeholder' => 'ID','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Email:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Specialization:</strong>
            {!! Form::select('specialization', ['IS' => 'Information System', 'SE' => 'Software Engineering', 'GD' => 'Game Development', 'DS'=>'Data Science'], null, array('placeholder' => '----------------','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            {!! Form::label('Administrator access') !!}<br />
            {!! Form::checkbox('admin', '1')!!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            {!! Form::label('Lecturer access') !!}<br />
            {!! Form::checkbox('lecturer', '1')!!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            {!! Form::label('Student access') !!}<br />
            {!! Form::checkbox('student', '1')!!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>