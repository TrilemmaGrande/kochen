@props(['recipe'])


<a href="/recipes/{{$recipe['id']}}">
    <x-index.card.recipe-picture :picture="$recipe->picture"/>
        <x-shared.recipe-title :recipe="$recipe"/>
</a> 
    <x-shared.recipe-description :recipe="$recipe"/>
    <x-index.recipe-tags :tags="$recipe->tags"/>
