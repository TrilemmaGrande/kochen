@props(['position'])

<div name="ingredientRow">
    <input type="text" name="ingredients[{{$position}}][quantity]" placeholder="Menge" value="{{old('ingredients.' .$position . '.quantity') }}">
    
    @error('ingredients.' .$position . '.quantity')
    <p>Numerischer Wert erforderlich!</p>
    @enderror
    
    <select name="ingredients[{{$position}}][unit_id]">
        <option value="" {{ old('ingredients.' .$position . '.unit_id') == '' ? 'selected' : '' }}>Einheit</option>
        @foreach(\App\Models\Unit::all() as $unit)
        <option value="{{ $unit->id }}" {{ old('ingredients.' .$position . '.unit_id') == $unit->id ? 'selected' : '' }}>
            {{ $unit->name }}
        </option>
        @endforeach
    </select>   
    
    <input type="text" name="ingredients[{{$position}}][name]" placeholder="Zutat"  value="{{old('ingredients.' .$position . '.name')}}">
    
    @error('ingredients.' .$position . '.name')
    <p>Feld erforderlich!</p>
    @enderror

    <button class="btn" onclick="removeIngredientRow(this)">-</button>

</div>