<?php

use App\Http\Controllers\StoryController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     // return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// App\Http\Controllers\Auth\LoginController@showLoginForm
Route::get('/', 'Auth\LoginController@showLoginForm');

Route::middleware(['auth'])->group(function(){
    // Route::get('/stories', 'StoryController@index')->name('stories.index');
    // Route::get('/stories/{story}', 'StoryController@show')->name('stories.show');

    Route::resource('stories', 'StoriesController');
});
