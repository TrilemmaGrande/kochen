@props(['ingredient','portions'])    

<div class="recipe-ingredient-row">
    <?php
        $quantity = $ingredient->pivot->quantity * $portions;
        $quantity = $quantity == floor($quantity) ? 
            number_format($quantity, 0, ",", ".") :      
            number_format($quantity, 2, ",", ".");    
            $quantity = $quantity > 0 ? $quantity : "";      
    ?>
<div name="quantity" data-quantity="{{ $quantity }}" >
    {{ $quantity }} 
</div>
<div name="unit">    
    {{$ingredient->pivot->unit->name ?? ""}} 
</div>
<div>
    {{$ingredient->name}}
</div>
</div>