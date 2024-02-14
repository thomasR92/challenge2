<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DestructionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes pour les opérations CRUD des produits
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::post('/items', [ItemController::class, 'store']);
Route::put('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);


// Route pour détruire un produit
Route::post('/destructions/{id}', [DestructionController::class, 'destroy']);
// Route pour afficher toutes les destructions
Route::get('/destructions', [DestructionController::class, 'index']);


// Route pour afficher tous les stocks
Route::get('/stocks', [StockController::class, 'index']);


Route::group(['prefix' => 'livraisons'], function () {
    Route::get('/', [LivraisonController::class, 'index']);
    Route::get('/{id}', [LivraisonController::class, 'show']);
    Route::post('/', [LivraisonController::class, 'store']);
});


// web.php

Route::get('/search', 'SearchController@search');
