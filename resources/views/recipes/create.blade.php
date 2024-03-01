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

    <br>
    <br>
    <br>

    <input type="text" name="ingredients[1][quantity]" placeholder="Menge">
    <select name="ingredients[1][unit_id]">
        <option value="" selected>Einheit wählen</option>
        @foreach(\App\Models\Unit::all() as $unit)
        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
        @endforeach
    </select>
    <input type="text" name="ingredients[1][name]" placeholder="Zutat">
    @error('ingredients[1][name]')
    <p>Feld erforderlich!</p>
    @enderror
    
    <br>
    <br>
    <br>

    <label for="preparation">Zubereitung</label>
    <input type="text" name="preparation" id="" placeholder="z.B. Alles mischen und Braten" value="{{old('preparation')}}">
    @error('preparation')
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