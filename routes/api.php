<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function(){


    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::post('/produtos/create', 'ApiProdutoController@store' );


});

Route::get('/produtos/all', 'ApiProdutoController@index' );

Route::prefix('auth')->group(function(){
    Route::post('login', ['\App\Http\Controllers\LoginCrontroller', 'login']);
});

Route::get('/', function(){
    return "Teste";
});