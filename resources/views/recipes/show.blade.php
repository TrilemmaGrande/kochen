@extends('layout')
@section('content')

<x-shared.site-heading :heading="$recipe->title"/>
    
<x-module-container>
    <div class="recipe-picture-container">
        <x-show.recipe-picture :picture="$recipe->picture"/>
    </div>
    <x-shared.recipe-description :recipe="$recipe"/>
</x-module-container>

<x-module-container>
    <x-show.recipe-portions :portions="$portions"/>
</x-module-container>

<x-module-container>
    <x-show.recipe-ingredients :ingredients="$recipe['ingredients']" :portions="$portions"/>
</x-module-container>

<x-module-container>
    <x-show.recipe-preparation :recipe="$recipe"/>
</x-module-container>

<x-module-container>
    <x-show.recipe-ref-edit :recipe="$recipe"/>
    <x-show.recipe-submit-delete :recipe="$recipe"/>
</x-module-container>

@endsection