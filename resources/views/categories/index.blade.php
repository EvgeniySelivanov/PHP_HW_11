@extends('templates.template')
@section('content')
    <h1>Categories</h1>
@if(session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                <td>{{$loop->iteration+($categories->currentPage()-1)*$categories->perPage()}}</td>  <!-- счетчик-->
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>
                    {{-- <a href="/categories/{{$item->id}}/edit" class="btn btn-warning">Edit</a> --}}
                    <a href="{{route('categories.edit',['category'=>$item->id])}}" class="btn btn-warning">Edit</a>
                    
                    <form action="{{route('categories.destroy',['category'=>$item->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                
                
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
{{$categories->links()}}

@endsection