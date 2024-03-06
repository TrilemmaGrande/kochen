@props(['recipe'])

<a href="/recipes/{{$recipe['id']}}">
    <x-shared.recipe-title :recipe="$recipe"/>
    <x-index.card.recipe-picture :picture="$recipe->picture"/>
    <x-shared.recipe-description :recipe="$recipe"/>
    <x-index.recipe-tags :tags="$recipe->tags"/>
</a> 