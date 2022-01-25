<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\MasterDataFeedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['WriteToDatabaseMiddleware', 'throttle:1,60'])
    ->get('products/{searchToken}', [ProductController::class, 'index']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
// });
