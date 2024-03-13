@props(['ingredients'])

<label for="ingredients">Zutaten</label>

    @foreach($ingredients as $ingredient)
    <?php     $position =  $ingredient->pivot->position ?>


        <x-edit.ingredients.recipe-ingredient :ingredient="$ingredient" :position="$position" />

  
    </div>  
    @endforeach

@error('ingredients.'.$position.'.name')
<p>Feld erforderlich!</p>
@enderror