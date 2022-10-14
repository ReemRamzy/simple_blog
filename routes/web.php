<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'pageController@posts');

Route::get('/posts/{post}', 'pageController@post');

Route::post('/posts/store', 'pageController@store');

Route::post('/posts/{post}/store', 'CommentsController@store');

Route::get('/category/{name}', 'pageController@category');



//Auth

Route::get('/register', 'RegisterationController@create');
Route::post('/register', 'RegisterationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/access_denied', 'pageController@accessDenied');

Route::post('/like', 'pageController@like')->name('like');
Route::post('/dislike', 'pageController@dislike')->name('dislike');
//test

Route::group(['middleware' =>'roles' , 'roles'=>['Admin']], function(){

    Route::get('/admin', 'pageController@admin');
    Route::post('/add-role', 'pageController@addRole');
    Route::post('/settings', 'pageController@settings');

Route::get('/statistics', 'pageController@statistics');

});

Route::group(['middleware' =>'roles' , 'roles'=>['Editor']], function(){

    Route::get('/editor', 'pageController@editor');

Route::get('/statistics', 'pageController@statistics');


});

Route::group(['middleware' =>'roles' , 'roles'=>['admin','editor','User']], function(){

    Route::get('/like', 'pageController@like')->name('like');
    Route::get('/dislike', 'pageController@dislike')->name('dislike');
});








