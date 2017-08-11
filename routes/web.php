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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/check','EmailCheckController@index');

Route::get('test','EmailCheckController@test');

/**
 * SPA Routes.
 */
// vuejs frontend page.
Route::get('{vue_capture?}', function() {
    return View::make('welcome');
})->where('vue_capture', '[\/\w\.-]*');