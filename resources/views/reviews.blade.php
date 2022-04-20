@extends('templates.template')

@section('content')
<h1 class="text-center">It's Page Reviews</h1>

@if(!$reviews->isEmpty())
    <table class="table">
    <tbody>
        <tr>
        
        <td style="font-weight:bold"><h2>User_name&Text</h2></td>
        <td style="font-weight:bold"><h2>Date</h2></td>
        

    </tr>
   @foreach($reviews as $review)
        <tr>
           
            <td><h3>{{$review->username}}</h3>
            
                <p>{{$review->text}}</p></td>
           <td>{{$review->time_date}}</td>    
        </tr>
        @endforeach
    </tbody>
</table>


@else<h2 style="color:blue;font-weight:bold;font-style:italic;">Напишите первый отзыв!!</h2>
@endif
<hr>
<h2 class="mt-5">Add review</h2>

<form action="/createreviews" method="GET">
    @csrf  <!--писать обязательно!!!! это защита-->

    <div class="form-group">
        <label for="name">Name user:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}">
        @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group mt-3">
        <label for="description">Text:</label>
        <textarea  name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <button class="btn btn-primary mt-3">Save</button>
  </form>

@endsection
