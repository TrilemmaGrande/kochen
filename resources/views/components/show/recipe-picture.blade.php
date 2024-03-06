@props(['picture'])

<img class="recipe-picture" src="{{$picture ? asset('storage/' . $picture) : asset('images/no-image.svg')}}" alt="" />
