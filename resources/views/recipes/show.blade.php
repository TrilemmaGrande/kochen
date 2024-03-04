@extends('layout')
@section('content')

<img class="recipe-picture" src="{{$recipe->picture ? asset('storage/' . $recipe->picture) : asset('images/no-image.svg')}}" alt="" />
<h2>
    {{$recipe['title']}}
</h2>
<p>
    {{$recipe['description']}}
</p>
<p>
<form method="GET" action="/recipes/{{$recipe->id}}">
    @csrf
    Anzahl Portionen:
    <input type="number" min="1" name="portions" value={{(float)$portions}}>
    <button type="submit">Berechnen</button>
</form>
</p>

<ul>
    @foreach($recipe['ingredients']->sortBy('pivot.position') as $ingredient) 
    <?php $quantity = $ingredient->pivot->quantity > 0 ? number_format((float)$ingredient->pivot->quantity * (float)$portions,2,",",".") : "" ?>
    <li>{{ $quantity }} {{$ingredient->pivot->unit->name ?? ""}} {{$ingredient->name}}</li>    
    @endforeach
</ul>
<p>
    {{$recipe['preparation']}}
</p>

<a href="/recipes/edit/{{$recipe->id}}">Bearbeiten</a>
<form method="POST" action="/recipes/{{$recipe->id}}">
    @csrf
    @method('DELETE')
    <button type="submit">Löschen</button>
</form>
@endsection