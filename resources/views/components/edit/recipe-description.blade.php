@props(['description'])

<label for="description">Beschreibung</label>
<input type="text" name="description" id="" value="{{old('description') ?? $description}}">
@error('description')
<p>Feld erforderlich!</p>
@enderror