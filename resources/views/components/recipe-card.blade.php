@props(['recipe'])

<a href="/recipes/{{$recipe['id']}}">
    <img class="recipe-picture" src="{{$recipe->picture ? asset('storage/' . $recipe->picture) : asset('images/no-image.svg')}}" alt="">
<h2>
   {{$recipe['title']}}  
</h2>
<p>
    {{$recipe['description']}}
</p>    
<x-recipe-tags :tagsCsv="$recipe->tags"/>
</a> 