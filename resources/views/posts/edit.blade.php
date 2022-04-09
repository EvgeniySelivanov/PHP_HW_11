@extends('templates.template')

@section('content')
  <h1>Edit Post {{$post->name}}</h1>
  
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif


  
  {!!Form::model($post, ['route' => ['posts.update', 'post'=>$post->id], 'method'=>'PUT','files'=>true])!!}
  @include('posts._form')
  {!!Form::close()!!}


@endsection