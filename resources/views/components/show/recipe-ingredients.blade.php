
    @foreach($ingredients->sortBy('pivot.position') as $ingredient) 
  
        <x-show.ingredients.recipe-ingredient :ingredient="$ingredient" :portions="$portions"/>
 
    @endforeach
