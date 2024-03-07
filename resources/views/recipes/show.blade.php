@extends('layout')
@section('content')

<x-module-container>
    <x-show.recipe-picture :picture="$recipe->picture"/>
    <x-shared.recipe-title :recipe="$recipe"/>
    <x-shared.recipe-description :recipe="$recipe"/>
</x-module-container>

<x-module-container>
    <x-show.recipe-portions :recipe="$recipe" :portions="$portions"/>
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