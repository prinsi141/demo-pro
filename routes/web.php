<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers','middleware' => ['auth']], function () {
    Route::resource('home', 'HomeController');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    
    Route::get('/generate-pdf', 'UserController@generatePDF');
    Route::get('/getState', 'UserController@getState');
    Route::get('/getCity/{id}', 'UserController@getCity');

});