@extends('admin.templates.template')

@section('content')
  <h1>Add Post</h1>
  
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif


  {!!Form::model($post, ['route' => ['posts.store'], 'files'=>true])!!}
  @include('posts._form')
  {!!Form::close()!!}


@endsection