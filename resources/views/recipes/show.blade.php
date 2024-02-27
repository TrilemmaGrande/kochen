@extends('layout')
@section('content')    

<img class="recipe-image" src="{{asset("images/no-image.svg")}}" alt="">
<h2>
    {{$recipe['title']}}
</h2>
<p>
    {{$recipe['description']}}
</p>
@endsection