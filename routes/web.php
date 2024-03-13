<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/recipes/create', [RecipeController::class, 'create']);

Route::get('/recipes/renderIngredientRow/{position}', [RecipeController::class, 'renderIngredientRow']);

Route::get('/recipes/edit/{recipe}',  [RecipeController::class, 'edit']);

Route::post('/recipes/save-image',  [RecipeController::class, 'storeImage']);

Route::put('/recipes/{recipe}',  [RecipeController::class, 'update']);

Route::delete('/recipes/{recipe}',  [RecipeController::class, 'destroy']);

Route::get('/recipes/{recipe}',  [RecipeController::class, 'show']);

Route::post('/recipes',  [RecipeController::class, 'store']);

Route::get('/', [RecipeController::class, 'index']);
Route::get('/', [RecipeController::class, 'index']);