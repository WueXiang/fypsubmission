<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Type:</strong>
            {!! Form::select('type', ['Research' => 'Research', 'Project' => 'Project'], null, array('placeholder' => '----------------','class' => 'form-control')) !!}

        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Specialization:</strong>
            {!! Form::select('specialization', ['IS' => 'Information System', 'SE' => 'Software Engineering', 'GD' => 'Game Development', 'DS'=>'Data Science'], null, array('placeholder' => '----------------','class' => 'form-control')) !!}
        </div>
    </div>
    <?php
                $user_id = Auth::user()->id;
    ?>
    {!! Form::hidden('supervisor_id', $user , null, array('placeholder' => '----------------','class' => 'form-control')) !!}

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>