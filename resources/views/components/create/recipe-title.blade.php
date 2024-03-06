<label for="title">Titel</label>
<input type="text" name="title" id="" placeholder="z.B. Lamm und Knödel mit Soße" value="{{old('title')}}">
@error('title')
<p>Feld erforderlich!</p>
@enderror