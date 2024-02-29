@props(['tags'])

<ul>
    @foreach ($tags as $tag)
    <li>
        <a href="/?tag={{$tag->id}}">{{$tag->name}}</a>
    </li>
    @endforeach
</ul>