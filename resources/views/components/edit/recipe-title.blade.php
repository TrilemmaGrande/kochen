@props(['title'])

<label for="title">Titel</label>
    <input type="text" name="title" id="" value="{{old('title') ?? $title}}">
    @error('title')
    <p>Feld erforderlich!</p>
    @enderror