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
    <input type="text" name="ingredients[1][quantity]" placeholder="Menge" value="{{old('ingredients.1.quantity') }}">
    @error('ingredients.1.quantity')
    <p>Numerischer Wert erforderlich!</p>
    @enderror
    <select name="ingredients[1][unit_id]">
        <option value="" {{ old('ingredients.1.unit_id') == '' ? 'selected' : '' }}>Einheit wählen</option>
        @foreach(\App\Models\Unit::all() as $unit)
            <option value="{{ $unit->id }}" {{ old('ingredients.1.unit_id') == $unit->id ? 'selected' : '' }}>
                {{ $unit->name }}
            </option>
        @endforeach
    </select>    
    <input type="text" name="ingredients[1][name]" placeholder="Zutat"  value="{{old('ingredients.1.name')}}">
    @error('ingredients.1.name')
    <p>Feld erforderlich!</p>
    @enderror


    <br>
    <br>
    <br>

    <label for="preparation">Zubereitung</label>
    <textarea type="text" name="preparation" id="preparationEditor" value="{{old('preparation')}}"placeholder="z.B. Alles mischen und Braten"></textarea>
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