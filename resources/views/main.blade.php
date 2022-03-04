@extends('templates.template')


@section('content')
<h1>{{ $title }}</h1>
<h2>{!!$subtitle !!}</h2>

@foreach ($categories as $category)
    {{$category->name}}<br>
    {{$category->description}}<hr>

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
