<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutocompleteSearchDBController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/autocomplete-textbox', [AutocompleteSearchDBController::class, 'index']);
Route::post('/search-from-db', [AutocompleteSearchDBController::class, 'searchDB']);