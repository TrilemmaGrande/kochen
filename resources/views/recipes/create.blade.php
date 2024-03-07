@extends('layout')
@section('content')

<x-shared.site-heading :heading="'Rezept erstellen'"/>

<form action="/recipes" method="POST" enctype="multipart/form-data">
    @csrf
    <x-module-container>
        <x-create.recipe-picture />
    </x-module-container>

    <x-module-container>
        <x-create.recipe-title />
    </x-module-container>

    <x-module-container>
        <x-create.recipe-description />
    </x-module-container>

    <x-module-container>
        <label for="ingredients">Zutaten</label>
        <?php $position = 1?>
        <x-create.recipe-ingredients :position="$position"/>
    </x-module-container>
    
    <x-module-container>
        <x-create.recipe-preparation />
    </x-module-container>
    
    <x-module-container>
        <x-create.recipe-tags />
    </x-module-container>
    
    <x-module-container>
        <x-create.recipe-submit-create />
    </x-module-container>
</form>
@endsection