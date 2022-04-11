{{-- @extends('layouts.app') --}}
 @extends('templates.template') 



@section('content')
<h1>{{ $title }}</h1>
<h2>{!!$subtitle !!}</h2>

@foreach ($importantPost as $imppost)
    <h3>{{$imppost->name}}</h3><br>
  <hr>

@endforeach


@forelse ($users as $user)
{{$loop->iteration}}{{$user}}<br>

@empty
    <p>No users</p>  
@endforelse
@endsection

@section('title', $title)
{{-- {{$title}}
@endsection --}}
