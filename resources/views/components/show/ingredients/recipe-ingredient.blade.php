    @props(['ingredient','portions'])    
    <?php $quantity = $ingredient->pivot->quantity > 0 ? number_format((float)$ingredient->pivot->quantity * (float)$portions,2,",",".") : "" ?>
    {{ $quantity }} {{$ingredient->pivot->unit->name ?? ""}} {{$ingredient->name}}