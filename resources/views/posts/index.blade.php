@extends('admin.templates.template')

@section('content')
  <h1>Posts</h1>
  
  @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Important</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $item)
      <tr data-id="{{$item->id}}">
        <td>{{$loop->iteration + ($posts->currentPage()-1)*$posts->perPage() }}</td>
        <td><img src="{{asset($item->thumbnail)}}" alt="{{$item->name}}" style="width: 80px"></td>
        <td>{{$item->name}}</td>
        <td>{{$item->content}}</td>
        <td>{{$item->category->name}}</td>
        <td><a href="#" class="important-post">{{$item->important==1?'ДА':'НЕТ'}}</a></td>
        <td>
          <a href="{{route('posts.edit', ['post'=>$item->id])}}" class="btn btn-warning mt-2">Edit</a>

          <form action="{{route('posts.destroy', ['post'=>$item->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger mt-2"> Delete </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{$posts->links()}}


@endsection


{{-- 1     1 + (1-1)*3
2     2 + (1-1)*3
3     3 + (1-1)*3


4     1 + (2-1)*3
5     2 + (2-1)*3
6     3 + (2-1)*3

7     1
8     2 --}}