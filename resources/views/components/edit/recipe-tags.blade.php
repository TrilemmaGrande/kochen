@props(['tags'])

<label for="tags">Tags (getrennt mit Kommata)</label>
<input type="text" name="tags" id="" value="{{old('tags') ?? $tags->pluck('name')->implode(', ')}}">
@error('tags')
<p>Feld erforderlich!</p>
@enderror