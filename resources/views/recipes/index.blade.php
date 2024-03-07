@extends('layout')
@section('content')   

<x-shared.site-heading :heading="'Alle Rezepte'"/>

@if (count($recipes) == 0)
<h2>Keine Rezepte gefunden!</h2>
@endif

<div class="card-list">
@foreach($recipes as $recipe)
    <x-module-container> 
        <x-index.recipe-card :recipe="$recipe"/>
    </x-module-container>
    @endforeach
</div>

<x-module-container>
    <div class="pagination">
        {{$recipes->links()}}
    </div>
</x-module-container>
@endsection