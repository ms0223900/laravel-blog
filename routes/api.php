<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', function() {
    return 'Users!!';
});

Route::get('user/{id}', function($id) {
    return "User id {$id}!!";
});


// Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
// Route::post('products', [App\Http\Controllers\ProductController::class, 'store']);
// Route::apiResource('product', App\Http\Controllers\ProductController::class);


// Route::get('posts', [App\Http\Controllers\PostController::class, 'index']);
Route::apiResource('posts', App\Http\Controllers\PostController::class);

Route::apiResource('mark-six/{year}', [App\Http\Controllers\MarkSixController::class, 'show']);
// Route::get('mark-six/{year}', function($year) {
//     return "Year {$year}!";
// });