<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Unit;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use App\Models\RecipeIngredient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $recipes = Recipe::factory(10)->create();

        foreach ($recipes as $recipe) {
            $ingredients = Ingredient::factory(5)->create();

            foreach ($ingredients as $ingredient) {
                $pivotAttributes = RecipeIngredient::factory()->make()->toArray();

                $recipe->ingredients()->attach($ingredient, $pivotAttributes);
            }

            $tags = Tag::factory(3)->create();
            $recipe->tags()->attach($tags);
        }
    }
}
