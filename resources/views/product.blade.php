@extends('templates.template')



@section('content')



<div class="row mt-3">

  <div class="col-md-3 mt-3">

    <img src="{{$post->thumbnail}}" alt="{{$post->name}}" class="img-fluid">

  </div>

  <div class="col-md-8"><h1>{{$post->name}}</h1></div>
  <div class="text-danger">{{$post->price}} UAH</div>
  <form action="" class="form add-to-cart">
      @csrf
      <input type="number" name="qty" id="" value="1" min="1">
      <input type="hidden" name="id" value="{{$post->id}}">
      <button class="btn-primary btn">Add to cart</button>
  </form>
</div>



@endsection