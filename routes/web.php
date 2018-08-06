<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('home');
});

Route::get('blade2',function () {
    return view('layouts.child');
});
Route::get('base',function () {
    return view('layouts.base');
});

//Route::get('/',function(){
//    $posts = App\Post::all();
//    return view('home',compact('posts'));
//});
//Route::get('post/{slug}',function($slug){
//    $post = App\Post::where('slug','=',$slug)->firstOrFail();
//    return View('post',compact('post'));
//});

//Voyager 代码
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('homepage',function (){
    return view('homepage');
});