<?php

use App\Models\Receipt;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('receipts', [
        'heading' => 'Neueste Rezepte',
        'receipts' => Receipt::all()
    ]);
});

Route::get('/receipts/{id}', function ($id) {
    return view('receipt', [
        'receipt' => Receipt::find($id)
    ]);
});
