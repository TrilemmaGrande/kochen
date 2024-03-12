@props(['portions'])

Anzahl Portionen:
<input type="number" min="1" name="portions" onchange="changeQuantity(this.value)"  value="{{ $portions }}">
