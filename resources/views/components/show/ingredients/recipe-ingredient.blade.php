@props(['ingredient','portions'])    

<?php $quantity = $ingredient->pivot->quantity > 0 ? number_format((float)$ingredient->pivot->quantity * (float)$portions,2,",",".") : "" ?>
<div name="quantity" data-quantity="{{ $quantity }}" >
    {{ $quantity }} 
</div>
<div>
    {{$ingredient->pivot->unit->name ?? ""}} 
</div>
<div>
    {{$ingredient->name}}
</div>