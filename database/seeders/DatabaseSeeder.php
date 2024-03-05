<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Unit;
use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;
use App\Models\RecipeIngredient;
use Illuminate\Support\Facades\Storage;

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
        $unitCount = 15;

        // Get the list of files in the pictures directory
        $files = Storage::disk('public')->files('pictures');
        // Delete each file in the pictures directory
        foreach ($files as $file) {
            Storage::disk('public')->delete($file);
        }
        for ($i = 0; $i < $unitCount; $i++) {
            Unit::factory()->create();
        }
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
            foreach ($ingredientIds as $ingredientId) {
                $unitId = Unit::inRandomOrder()->pluck('id')->first();
                $recipeIngredient = RecipeIngredient::factory()->create([
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $ingredientId,
                    'position' => $position,
                    'unit_id' => $unitId
                ]);
        
                $position++;
            }
        }
    }
}
