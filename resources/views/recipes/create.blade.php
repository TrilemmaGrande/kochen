@extends('layout')
@section('content')

<x-shared.site-heading :heading="'Rezept erstellen'"/>

<form action="/recipes" method="POST" enctype="multipart/form-data">
    @csrf
    <x-create.recipe-title />
    <x-create.recipe-picture />
    <x-create.recipe-description />
    <label for="ingredients">Zutaten</label>
    <?php $position = 1?>
    <x-create.recipe-ingredients :position="$position"/>
    <x-create.recipe-preparation />
    <x-create.recipe-tags />
    <x-create.recipe-submit-create />
</form>
@endsection