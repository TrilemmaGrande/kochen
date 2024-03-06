@extends('layout')
@section('content')

<x-shared.site-heading :heading="'Rezept bearbeiten'"/>

<form action="/recipes/{{$recipe->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-edit.recipe-title :title="$recipe->title" />
    <x-edit.recipe-picture :picture="$recipe->picture" />
    <x-edit.recipe-description :description="$recipe->description" />
    <x-edit.recipe-preparation :preparation="$recipe->preparation" />
    <x-edit.recipe-ingredients :ingredients="$recipe->ingredients" />
    <x-edit.recipe-tags :tags="$recipe->tags" />
    <x-edit.recipe-description :description="$recipe->description" />
    <x-edit.recipe-submit-edit />    
</form>
@endsection