<?php
use Illuminate\Http\Request;

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

Route::get('/page/{slug}', 'PageController@show');

// Admin Routing
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    // Pages
    Route::resource('pages', 'PageController', ['except' => [
        'show'
    ]]); 

    // Users
    Route::resource('users', 'UserController', ['except' => [
        'create', 'store'
    ]]); 

    // Users
    Route::resource('categories', 'CategoryController', ['except' => [
        'show',
    ]]);                              
});

Route::get('/test/qfdg', function(Request $request) {
});