@extends('layout')
@section('content')   

<x-shared.site-heading :heading="'Alle Rezepte'"/>

@include('partials._search')

@if (count($recipes) == 0)
<h2>Keine Rezepte gefunden!</h2>
@endif

@foreach($recipes as $recipe)
<x-index.recipe-card :recipe="$recipe"/>
@endforeach

<div class="pagination">
{{$recipes->links()}}
</div>

@endsection