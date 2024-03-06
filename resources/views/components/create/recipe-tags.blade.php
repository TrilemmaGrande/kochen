<label for="tags">Tags (getrennt mit Kommata)</label>
<input type="text" name="tags" id="" placeholder="z.B. fleisch, schnell, einfach" value="{{old('tags')}}">
@error('tags')
<p>Feld erforderlich!</p>
@enderror