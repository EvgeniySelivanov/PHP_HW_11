@extends('templates.template')

@section('content')
<h1 class="text-center">It's Page Reviews</h1>

<table class="table">
    <tbody>
        <tr>
        <td style="font-weight:bold">id</td>
        <td style="font-weight:bold">username</td>
        <td style="font-weight:bold">text</td>
    </tr>
       @foreach($reviews as $review)
        <tr>
            <td>{{$review->id}}</td>
            <td>{{$review->username}}</td>
            <td>{{$review->text}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@section('title', $title)