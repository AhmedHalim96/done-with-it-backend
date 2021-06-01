<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\V1\CategoryController;
use App\Http\Controllers\V1\ListingController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/login', [UserController::class, 'login']);

Route::get('/categories', [CategoryController::class, "index"]);

// Route::apiResource("listings", ListingController::class);
Route::prefix("listings")->group(function () {
    Route::get("/", [ListingController::class, "index"]);
    Route::get("/{listing}", [ListingController::class, "show"]);
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/', [ListingController::class, "store"]);
        Route::patch("/{listing}", [ListingController::class, "update"]);
        Route::delete("/{listing}", [ListingController::class, "destroy"]);
    });
});
