<label for="preparation">Zubereitung</label>
<textarea type="text" name="preparation" id="preparationEditor" value="{{old('preparation')}}"placeholder="z.B. Alles mischen und Braten">{{old('preparation')}}</textarea>
@error('preparation')
<p>Feld erforderlich!</p>
@enderror