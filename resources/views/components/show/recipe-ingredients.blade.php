<ul>
    @foreach($ingredients->sortBy('pivot.position') as $ingredient) 
    <li>
        <x-show.ingredients.recipe-ingredient :ingredient="$ingredient" :portions="$portions"/>
    </li>    
    @endforeach
</ul>