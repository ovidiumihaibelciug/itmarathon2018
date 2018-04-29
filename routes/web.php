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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::prefix('api')->group(function () {
    Route::get('/user', 'AuthenticationController@getAuthUser')->name('user');
    Route::get('/user/{username}', 'AuthenticationController@getUser');
    Route::get('/cabinet/all/{search?}', 'CabinetController@all');
    Route::get('/cabinet/id/{id}', 'CabinetController@index')->name('cabinet');
    Route::get('/pet/{username}', 'PetController@get');
    Route::post('/pet', 'PetController@add');
    Route::delete('/pet/{pet}', 'PetController@delete');
    Route::get('/pet/profile/{pet}', 'PetController@getPet');
    Route::post('/cabinet', 'CabinetController@add');
    Route::post('/treatment', 'ServicesController@add');
});