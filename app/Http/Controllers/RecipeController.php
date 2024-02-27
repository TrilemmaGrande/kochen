<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index', [
            'heading' => 'Neueste Rezepte',
            'recipes' => Recipe::latest()->filter(request(['tag', 'search']))->simplePaginate(6)
        ]);
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('recipes', 'title')],
            'description' => 'required',
            'tags' => 'required'
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        Recipe::create($formFields);

        return redirect('/')->with('message', 'Rezept erfolgreich erstellt!');
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', ['recipe' => $recipe]);
    }

    public function update(Request $request, Recipe $recipe)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required'
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $recipe->update($formFields);

        return back()->with('message', 'Rezept erfolgreich geändert!');
    }

public function destroy(Recipe $recipe){
    if (isset($recipe->picture)) {
        Storage::disk('public')->delete($recipe->picture);
    }
    $recipe->delete();
    return redirect('/')->with('message', 'Rezept wurde gelöscht!');
}

    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
}
