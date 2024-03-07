@props(['recipe','portions'])
<form method="GET" action="/recipes/{{$recipe->id}}">
    @csrf
    Anzahl Portionen:
    <input type="number" min="1" name="portions" value={{(float)$portions}}>
    <button class="btn" type="submit">Berechnen</button>
</form>