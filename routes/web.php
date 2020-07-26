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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route middleware
// Route::get('admin/routes', 'HomeController@admin')->middleware('admin')->name('admin');

// Group middleware
// Route::group(['middleware' => ['admin']], function () {
//     Route::get('admin/routes', 'HomeController@admin')->name('admin');
// });

// Multiple Middlewares in Single Route
Route::get('admin/routes', 'HomeController@admin')->middleware(['auth', 'admin'])->name('admin');

// Test for new facade
Route::get('/test', function () {
    dd(NNWT::getName(), NNWT::getYourName());
});

Route::resource('posts', 'PostController');
