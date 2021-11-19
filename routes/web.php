<?php

use App\Http\Controllers\ServicesController;

use Illuminate\Support\Facades\Route;

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

Route::get('/services', [ServicesController::class, 'index']);

// Edit (PUT)
Route::get('/services/{service}/edit', [ServicesController::class, 'edit']);
Route::put('services/{service}', [ServicesController::class, 'update']);

// Detail (GET)
Route::get('/services/{service}/detail', [ServicesController::class, 'detail']);

// Add (POST)
Route::get('/services/create', [ServicesController::class, 'create']);
Route::post('/services', [ServicesController::class, 'save']);

// Delete (DELETE)
Route::delete('/services/{service}', [ServicesController::class, 'destroy']);

// MRR (GET)
Route::get('/services/mrr', [ServicesController::class, 'countMRR']);
