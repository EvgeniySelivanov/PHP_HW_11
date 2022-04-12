{{-- @extends('layouts.app') --}}
 @extends('templates.template') 



@section('content')

{{-- @foreach ($importantPost as $imppost)
    <h3>{{$imppost->name}}</h3><br>
    <h6>{{$imppost->content}}</h6>
  <hr>

@endforeach --}}
<table class="table mt-3">
<tbody>
  @foreach ($importantPost as $imppost)
  <tr>
    {{-- <td>{{$loop->iteration + ($imppost->currentPage()-1)*$imppost->perPage() }}</td> --}}
    <td>{{$imppost->created_at}}</td>
    <td><img src="{{asset($imppost->thumbnail)}}" alt="{{$imppost->name}}" style="width: 180px"></td>
    <td ><h3 style="font-weight: bold;">{{$imppost->name}}</h3></td>
    <td><h5>{{$imppost->content}}</h5></td>
    <td><a href="category/{{$imppost->category->id}}">
      <h5 style="font-weight: bold;">{{$imppost->category->name}}</h5>
    </a> </td>
  </tr>
  @endforeach
</tbody>
</table>


@endsection

