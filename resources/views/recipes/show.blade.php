@extends('layout')
@section('content')

<x-show.recipe-picture :picture="$recipe->picture"/>
<x-shared.recipe-title :recipe="$recipe"/>
<x-shared.recipe-description :recipe="$recipe"/>
<x-show.recipe-portions :recipe="$recipe" :portions="$portions"/>
<x-show.recipe-ingredients :ingredients="$recipe['ingredients']" :portions="$portions"/>
<x-show.recipe-preparation :recipe="$recipe"/>
<x-show.recipe-ref-edit :recipe="$recipe"/>
<x-show.recipe-submit-delete :recipe="$recipe"/>

@endsection