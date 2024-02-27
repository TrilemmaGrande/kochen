@extends('layout')
@section('content')    

<img class="recipe-picture" src="{{$recipe->picture ? asset('storage/' . $recipe->picture) : asset('images/no-image.svg')}}" alt="" />
<h2>
    {{$recipe['title']}}
</h2>
<p>
    {{$recipe['description']}}
</p>
<a href="/recipes/edit/{{$recipe->id}}">Bearbeiten</a>
<form method="POST" action="/recipes/{{$recipe->id}}">
    @csrf
    @method('DELETE')
    <button type="submit">Löschen</button>
</form>
@endsection