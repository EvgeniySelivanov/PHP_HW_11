<div class="form-group">
{!! Form::label('name')!!}
{!! Form::text('name',null,['class'=>'form-control'])!!}
</div>

<div class="form-group mt-3">
    {!! Form::label('content')!!}
    {!! Form::textarea('content',null,['class'=>'form-control'])!!}
</div>

<div class="form-group mt-3">
        {!! Form::label('important','Post is important?')!!}
        {!! Form::checkbox('important',1,null)!!}
</div>

<div class="form-group mt-3">
    {!! Form::label('category_id','Category')!!}
    {!! Form::select('category_id',$categories,null,['class'=>'form-control'])!!}
</div>
<div class="form-group mt-3">
    {!! Form::label('thumbnail','Image')!!}
    {!! Form::file('thumbnail')!!}
</div>



{!!Form::submit('Save', ['class'=>'btn btn-primary mt-3'])!!}