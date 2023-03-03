<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware( 'auth:sanctum' )->get( '/user', function ( Request $request ) {
    return $request->user();
} );

Route::get( '/articles', [ArticleController::class, "getAllArticles"] );
Route::get( '/articles/{id}', [ArticleController::class, "getArticle"] );
Route::middleware( "auth:api" )->group( function () {
    Route::post( '/articles', [ArticleController::class, "createArticle"] );
    Route::put( '/articles/{article}', [ArticleController::class, "updateArticle"] );
    Route::delete( '/articles/{article}', [ArticleController::class, "deleteArticle"] );
} );

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
    return $request->user();
} );

Route::post( '/token', [UserController::class, 'generateToken'] );
