@props(['recipe'])

<a href="/recipes/{{$recipe['id']}}">
    <img class="recipe-image" src="{{asset("images/no-image.svg")}}" alt="">
<h2>
   {{$recipe['title']}}  
</h2>
<p>
    {{$recipe['description']}}
</p>    
<x-recipe-tags :tagsCsv="$recipe->tags"/>
</a> 