@props(['ingredient','position'])

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

<input type="text" name="ingredients[{{ $position }}][name]" value="{{ old('ingredients.'.$position.'.name') ?? $ingredient->name }}">
