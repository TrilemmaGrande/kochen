<?php

namespace App\Http\Controllers;

use App\Models\Tag;
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
            'recipes' => Recipe::latest('recipes.created_at')->filter(request(['tag', 'search']))->simplePaginate(10)
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
            'preparation' => 'required'
        ]);
        $tagsCsv = $request->validate(['tags' => 'required'])['tags'];

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }
        $recipe = Recipe::create($formFields);
        $this->UpdateAndCreateTags($tagsCsv, $recipe);

        return redirect('/')->with('message', 'Rezept erfolgreich erstellt!');
    }

    public function show(Recipe $recipe)
    {
        $portions = request('portions') ?? 1.00;
        foreach ($recipe->ingredients as $ingredient) {
            $ingredient->quantity *= $portions;
        }
        return view('recipes.show', [
            'recipe' => $recipe, 
            'portions' => $portions
        ]);
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
            'preparation' => 'required'
        ]);
        $tagsCsv = $request->validate(['tags' => 'required'])['tags'];

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }
        $this->UpdateAndCreateTags($tagsCsv, $recipe);
        $recipe->update($formFields);

        return back()->with('message', 'Rezept erfolgreich geändert!');
    }

    public function destroy(Recipe $recipe)
    {
        if (isset($recipe->picture)) {
            Storage::disk('public')->delete($recipe->picture);
        }
        $recipe->delete();
        return redirect('/')->with('message', 'Rezept wurde gelöscht!');
    }

    private function UpdateAndCreateTags(String $tagsCsv, Recipe $recipe)
    {
        // convert tags to array
        $tagNames = explode(',', $tagsCsv);
        // create final array with matching tags
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tagModel = Tag::firstOrCreate(['name' => trim($tagName)]);
            $tagIds[] = $tagModel->id;
        }
        $recipe->tags()->sync($tagIds);
    }
}
