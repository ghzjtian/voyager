<?php

use Illuminate\Http\Request;

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

//Route::middleware('api')->get('/user', function (Request $request) {
//    return 'Good';
//});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login') ;
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::any('me', 'AuthController@me');
    Route::any('posts',function (){
        $posts = \TCG\Voyager\Models\Post::all();
        return $posts;
    });
    Route::any('all_users','AuthController@getAllUsers');
});