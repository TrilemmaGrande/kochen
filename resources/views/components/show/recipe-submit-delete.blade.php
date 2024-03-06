@props(['recipe'])


<form method="POST" action="/recipes/{{$recipe->id}}">
    @csrf
    @method('DELETE')
    <button type="submit">Löschen</button>
</form>