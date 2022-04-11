 @extends('templates.template')
@section('content')
    <h1>Edit Reviews</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('reviewsadmin.update',['reviewsadmin'=>$reviews->id])}}" method="POST">
    @method('PUT')
    
    @csrf  <!--писать обязательно!!!! это защита-->

    <div class="form-group">
        <label for="username">Name User</label>
        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror"  value="{{ old('username')??$reviews->username}}">
        @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <div class="form-group mt-3">
        <label for="text">Text reviews</label>
        <textarea  name="text" id="text" class="form-control @error('text') is-invalid @enderror">{{ old('text')??$reviews->text}}</textarea>
        @error('text')
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
    </div>
    <input type="hidden" name="id" value={{$reviews->id}}>
    <button class="btn btn-primary mt-3">Save</button>
  </form>



@endsection 