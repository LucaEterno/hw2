<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

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
    return redirect('welcome');
});

//LOGIN CONTROLLER
Route::get('welcome', 'App\Http\Controllers\LoginController@welcome');
Route::get('login', 'App\Http\Controllers\LoginController@login_form');
Route::post('login', 'App\Http\Controllers\LoginController@do_login');
Route::get('register', 'App\Http\Controllers\LoginController@register_form');
Route::post('register', 'App\Http\Controllers\LoginController@do_register');
Route::get('check/username/{username}', 'App\Http\Controllers\LoginController@check_username');
Route::get('check/email/{email}', 'App\Http\Controllers\LoginController@check_email');
Route::get('logout', 'App\Http\Controllers\LoginController@logout');

//HOME CONTROLLER
Route::get('home', 'App\Http\Controllers\HomeController@home');
Route::get('events/list', 'App\Http\Controllers\HomeController@list');
Route::get('events/list/filtered/{type}', 'App\Http\Controllers\HomeController@filteredList');
Route::get('events/get/info/{id}', 'App\Http\Controllers\HomeController@getInfo');
Route::get('events/get/follower/{id}', 'App\Http\Controllers\HomeController@getFollower');
Route::get('events/follow/add/{id}', 'App\Http\Controllers\HomeController@follow_add');
Route::get('events/follow/remove/{id}', 'App\Http\Controllers\HomeController@follow_remove');

//EVENT CONTROLLER
Route::get('add-event', 'App\Http\Controllers\EventController@event_form');
Route::post('add-event', 'App\Http\Controllers\EventController@add_event');

//SPOTIFY CONTROLLER
Route::get('spotify', 'App\Http\Controllers\SpotifyController@spotify');
Route::get('spotify/api/{type}/{track?}', 'App\Http\Controllers\SpotifyController@api');

//PREF CONTROLLER
Route::get('preferiti', 'App\Http\Controllers\PrefController@preferiti');
Route::get('tracks/list', 'App\Http\Controllers\PrefController@list');
Route::get('tracks/exist/{url}', 'App\Http\Controllers\PrefController@exist');
//Route::get('tracks/add/{url}/{cover}', 'App\Http\Controllers\PrefController@getAdd'); 
Route::post('tracks/add', 'App\Http\Controllers\PrefController@postAdd');
Route::get('tracks/remove/{url}', 'App\Http\Controllers\PrefController@remove');
