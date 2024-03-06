@props(['picture'])

<img class="recipe-picture-card" src="{{$picture ? asset('storage/' . $picture) : asset('images/no-image.svg')}}" alt="" />
