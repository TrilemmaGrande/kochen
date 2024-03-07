@props(['recipe'])


<form method="POST" action="/recipes/{{$recipe->id}}">
    @csrf
    @method('DELETE')
    <button class="btn" type="submit">Löschen</button>
</form>