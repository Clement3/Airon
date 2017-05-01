<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/@{name}', 'ProfileController@show')->name('profile');

Route::get('/page/{slug}', 'PageController@show');

// Contact
Route::get('/contact', 'PageController@getContact');
Route::post('/contact', 'PageController@postContact');

// Confirmation
Route::get('/confirmation/create', 'ConfirmationController@create');
Route::get('/confirmation/{name}/{key}', 'ConfirmationController@confirm');
Route::get('/confirmation/show', 'ConfirmationController@show');

// Item
Route::get('/item/create', 'ItemController@create');
Route::get('/item/{id}', 'ItemController@show');

// Settings
Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'UserController@getSettings');
    Route::post('/', 'UserController@postSettings');

    // Adresses
    Route::resource('adresses', 'LocationController'); 
    Route::get('/adresses/{id}/main', 'LocationController@setMain');

    // Update Mail
    Route::get('/email', 'UserController@getUpdateEmail');
    Route::post('/email', 'UserController@postUpdateEmail');

    // Update Password
    Route::get('/password', 'UserController@getUpdatePassword');
    Route::post('/password', 'UserController@postUpdatePassword');

    // Destroy Avatar
    Route::get('/avatar/destroy', 'UserController@destroyProfilePicture');    
});

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

    // Categories
    Route::resource('categories', 'CategoryController', ['except' => [
        'show',
    ]]);                              
});
