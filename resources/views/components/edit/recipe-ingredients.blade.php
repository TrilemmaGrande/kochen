@props(['ingredients'])

<label for="ingredients">Zutaten</label>
<ul>
    @foreach($ingredients as $ingredient)
    <?php     $position =  $ingredient->pivot->position ?>
    <li>
        <x-edit.ingredients.recipe-ingredient :ingredient="$ingredient" :position="$position" />
    </li>
    @endforeach
</ul>
@error('ingredients.'.$position.'.name')
<p>Feld erforderlich!</p>
@enderror