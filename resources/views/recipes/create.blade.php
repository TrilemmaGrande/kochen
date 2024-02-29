@extends('layout')
@section('content')    
<form action="/recipes" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="picture">Bild</label>
    <input type="file" name="picture" id="">
    <label for="title">Titel</label>
    <input type="text" name="title" id="" placeholder="z.B. Lamm und Knödel mit Soße" value="{{old('title')}}">
    @error('title')
        <p>Feld erforderlich!</p>
    @enderror
    <label for="description">Beschreibung</label>
    <input type="text" name="description" id="" placeholder="z.B. schnelles Gericht mit viel Fleisch" value="{{old('description')}}">
    @error('description')
    <p>Feld erforderlich!</p>
    @enderror
    <label for="tags">Tags (getrennt mit Kommata)</label>
    <input type="text" name="tags" id="" placeholder="z.B. fleisch, schnell, einfach" value="{{old('tags')}}">
    @error('tags')
    <p>Feld erforderlich!</p>
    @enderror
    <button type="submit">Rezept anlegen</button>
</form>
@endsection