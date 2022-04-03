@extends('templates.template')
@section('content')
    <h1>Add Categories</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{route('categories.store')}}" method="POST">
    @csrf  <!--писать обязательно!!!! это защита-->

    <div class="form-group">
        <label for="name">Name category:</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}">
        @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group mt-3">
        <label for="description">Description category:</label>
        <textarea  name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <button class="btn btn-primary mt-3">Save</button>
  </form>



@endsection