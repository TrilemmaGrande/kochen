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
        $tagCount = 10;
        $ingredientCount = 20;
        $recipeCount = 20;


        for ($i = 0; $i < $tagCount; $i++) {
            Tag::factory()->create();
        }
        for ($i = 0; $i < $ingredientCount; $i++) {
            Ingredient::factory()->create();
        }
        for ($i = 0; $i < $recipeCount; $i++) {
            $recipe = Recipe::factory()->create();
   
            // Füge Tags hinzu
            $tagIds = Tag::inRandomOrder()->limit(5)->pluck('id')->toArray();
            $recipe->tags()->attach($tagIds);
            // Füge Ingredients hinzu           
            $ingredientIds = Ingredient::inRandomOrder()->limit(7)->pluck('id')->toArray();
            $position = 1;
            foreach ($ingredientIds as $ingredient) {
                $pivotAttributes = RecipeIngredient::factory()->make(['position'=>$position])->toArray();
                $recipe->ingredients()->attach($ingredient, $pivotAttributes);
                $position++;
            }
        }
    }
}
