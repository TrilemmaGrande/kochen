@props(['preparation'])

<label for="preparation">Zubereitung</label>
    <textarea type="text" name="preparation" id="preparationEditor" value="{{old('preparation') ?? $preparation}}">{{old('preparation') ?? $preparation}}</textarea>
    @error('preparation')
    <p>Feld erforderlich!</p>
    @enderror