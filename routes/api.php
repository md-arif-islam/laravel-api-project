<?php

use App\Http\Controllers\ArticleController;
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
Route::post( '/articles', [ArticleController::class, "createArticle"] );
Route::put( '/articles/{id}', [ArticleController::class, "updateArticle"] );
Route::delete( '/articles/{id}', [ArticleController::class, "delete Article"] );
