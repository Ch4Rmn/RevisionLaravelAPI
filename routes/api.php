<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\ProductController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get('testing', function () {
//     // return response()->json([
//     //     'fruit' => 'apple'
//     // ]);

//     // array return Direct Change to Json
//     return [
//         [
//         'name' => 'lin',
//         'age' => 4
//     ], [
//         'name' => 'apple',
//         'age' => 5
//     ]
// ];

// });

// One
Route::apiResource('Product', ProductController::class);
//Many
Route::apiResource('Item', ItemController::class);

// // Many
// Route::apiResource('Product', ProductController::class);
// Many
Route::apiResource('Category', CategoryController::class);
