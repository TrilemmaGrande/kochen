@extends('layout')
@section('content')
<form action="/recipes/{{$recipe->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="picture">Bild</label>
    <input type="file" name="picture" id="">
    <img class="recipe-picture" src="{{$recipe->picture ? asset('storage/' . $recipe->picture) : asset('images/no-image.svg')}}" alt="" />

    <label for="title">Titel</label>
    <input type="text" name="title" id="" value="{{old('title') ?? $recipe->title}}">
    @error('title')
    <p>Feld erforderlich!</p>
    @enderror
    <label for="description">Beschreibung</label>
    <input type="text" name="description" id="" value="{{old('description') ?? $recipe->description}}">
    @error('description')
    <p>Feld erforderlich!</p>
    @enderror

    <br>
    <br>
    <br>

    <label for="ingredients">Zutaten</label><br>
    @foreach($recipe->ingredients as $ingredient)
    <?php     $position =  $ingredient->pivot->position ?>
     {{$position }}
    <input type="text" name="ingredients[{{ $position }}][quantity]" value="{{ old('ingredient.'.$position.'.quantity') ?? $ingredient->pivot->quantity }}">
    @error('ingredients.'.$position.'.quantity')
    <p>Numerischer Wert erforderlich!</p>
    @enderror
    <select name="ingredients[{{ $position }}][unit_id]">
        <option value="" selected>Einheit</option>
        @foreach(\App\Models\Unit::all() as $unit)
        <option value="{{ $unit->id }}" {{ (old('ingredients.'.$position.'.unit_id') ?? $ingredient->pivot->unit_id) == $unit->id ? 'selected' : '' }}>
            {{ $unit->name }}
        </option>
        @endforeach
    </select>
    <input type="text" name="ingredients[{{ $position }}][name]" value="{{ old('ingredients.'.$position.'.name') ?? $ingredient->name }}"><br>    @endforeach
    @error('ingredients.'.$position.'.name')
    <p>Feld erforderlich!</p>
    @enderror

    <br>
    <br>
    <br>

    <label for="preparation">Zubereitung</label>
    <textarea type="text" name="preparation" id="preparationEditor" value="{{old('preparation') ?? $recipe->preparation}}">{{old('preparation') ?? $recipe->preparation}}</textarea>
    @error('preparation')
    <p>Feld erforderlich!</p>
    @enderror
    <label for="tags">Tags (getrennt mit Kommata)</label>
    <input type="text" name="tags" id="" value="{{old('tags') ?? $recipe->tags->pluck('name')->implode(', ')}}">
    @error('tags')
    <p>Feld erforderlich!</p>
    @enderror
    <button type="submit">Rezept ändern</button>
</form>
@endsection