@props(['recipe'])


<a href="/recipes/{{$recipe['id']}}">
    <div class="recipe-picture-card-container">
        <x-index.card.recipe-picture :picture="$recipe->picture"/>
    </div>
        <x-shared.recipe-title :recipe="$recipe"/>
</a> 
    <x-shared.recipe-description :recipe="$recipe"/>
    <x-index.recipe-tags :tags="$recipe->tags"/>
