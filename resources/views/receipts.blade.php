@extends('layout')
@section('content')    
<h1>{{$heading}}</h1>

@if (count($receipts) == 0)
<h2>Keine Rezepte verfügbar!</h2>
@endif
@foreach($receipts as $receipt)
<h2>
    <a href="/receipts/{{$receipt['id']}}"> {{$receipt['title']}}</a>   
</h2>
<p>
    {{$receipt['description']}}
</p>
@endforeach
@endsection