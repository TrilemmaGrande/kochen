<label for="description">Beschreibung</label>
<input type="text" name="description" id="" placeholder="z.B. schnelles Gericht mit viel Fleisch" value="{{old('description')}}">
@error('description')
<p>Feld erforderlich!</p>
@enderror