@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul>
    @foreach ($tags as $tag)
    <li>
        <a href="/?tag={{trim($tag)}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>