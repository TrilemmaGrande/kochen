@extends('layout')
@section('content')

<x-shared.site-heading :heading="'Rezept bearbeiten'"/>

<form action="/recipes/{{$recipe->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        
    <x-module-container>
        <div class="recipe-picture-container">
            <x-edit.recipe-picture :picture="$recipe->picture" />
        </div>
        <x-edit.recipe-picture-input/>
    </x-module-container>

    <x-module-container>
        <x-edit.recipe-title :title="$recipe->title" />
    </x-module-container>
        
    <x-module-container>
        <x-edit.recipe-description :description="$recipe->description" />
    </x-module-container>
    
    <x-module-container>
        <x-edit.recipe-preparation :preparation="$recipe->preparation" />
    </x-module-container>
    
    <x-module-container>
        <x-edit.recipe-ingredients :ingredients="$recipe->ingredients" />
            <div class="btn" onclick="addIngredientRow(this)">+</div>
    </x-module-container>
    
    <x-module-container>
        <x-edit.recipe-tags :tags="$recipe->tags" />
    </x-module-container>
    
    <x-module-container>
        <x-edit.recipe-submit-edit />    
    </x-module-container>
</form>
@endsection