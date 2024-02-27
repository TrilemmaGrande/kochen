<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {        
        return view('recipes.index', [
            'heading' => 'Neueste Rezepte',
            'recipes' => Recipe::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
}
