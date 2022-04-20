{{-- @extends('layouts.app') --}}
 @extends('templates.template') 



@section('content')
@auth
<h1>Авторизированый</h1>
@endauth

@guest
<h1>Неавторизированый</h1>   
@endguest

{{-- {{dump(Auth::user()->roles->contains('name','admin'))}}
{{dump(Auth::user()->isAdmin())}} --}}


<table class="table mt-3">
<tbody>
  @foreach ($importantPost as $imppost)
  <tr>
    {{-- date_format($date, 'Y-m-d H:i:s'); --}}

    <td>{{date_format($imppost->created_at,'d.m.Y')}}</td>
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

