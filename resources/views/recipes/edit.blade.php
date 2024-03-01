@extends('layout')
@section('content')    
<form action="/recipes/{{$recipe->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="picture">Bild</label>
    <input type="file" name="picture" id="">
    <img class="recipe-picture" src="{{$recipe->picture ? asset('storage/' . $recipe->picture) : asset('images/no-image.svg')}}" alt="" />

    <label for="title">Titel</label>
    <input type="text" name="title" id=""  value="{{$recipe->title}}">
    @error('title')
        <p>Feld erforderlich!</p>
    @enderror
    <label for="description">Beschreibung</label>
    <input type="text" name="description" id=""  value="{{$recipe->description}}">
    @error('description')
    <p>Feld erforderlich!</p>
    @enderror
    <label for="preparation">Zubereitung</label>
    <input type="text" name="preparation" id=""  value="{{$recipe->preparation}}">
    @error('preparation')
    <p>Feld erforderlich!</p>
    @enderror
    <label for="tags">Tags (getrennt mit Kommata)</label>
    <input type="text" name="tags" id="" value="{{$recipe->tags->pluck('name')->implode(', ')}}">
    @error('tags')
    <p>Feld erforderlich!</p>
    @enderror
    <button type="submit">Rezept ändern</button>
</form>
@endsection