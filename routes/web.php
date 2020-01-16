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
Route::view('/start','Start');
Route::redirect('/impressum','/start');
Route::get('/produkte','ProduktController@show');
Route::match(['get','post'],'/details','DetailController@show')->name('detail');
Route::get('/zutaten','ZutatenController@show');
Route::get('/login', function() {
    return view('Login');
});
Route::post('/login','LoginController@show');
