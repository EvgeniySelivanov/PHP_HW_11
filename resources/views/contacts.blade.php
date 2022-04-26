@extends('templates.template')
@section('content')
<h1 class="text-center">Message</h1>
{!!Form::open(['url'=>'get-form','class'=>'contact-form'])!!}
<div class="form-group mt-3">
  {!!Form::label('email','Email:')!!}
  {!!Form::email('email',null,['class'=>'form-control'])!!}
</div>

<div class="form-group mt-3">
  {!!Form::label('message','Message:')!!}
  {!!Form::textarea('message',null,['class'=>'form-control'])!!}
</div>

{!!Form::submit('Send message',['class'=>'btn btn-primary mt-3'])!!}
{!!Form::close()!!}
  
    

  


@endsection

@section('sidebar')
@parent
    some text
@endsection