<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

// Route::get('/', function () {
//     return view('');
// });

// Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
//     Route::get('dashboard', 'DashboardController')->name('dashboard');

//     Route::get('users/roles', 'UserController@roles')->name('users.roles');
//     Route::resource('users', 'UserController', [
//         'names' => [
//             'index' => 'users'
//         ]
//     ]);
// });

Route::get('/', 'HomeController@index');

Route::prefix('admin')->middleware('role:admin')
->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('user', 'UserController');

});

Route::get('/home', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@show')->name('profile');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//error handling 404 and 500

// Route::get('/404', function(){
//     return response(view('errors.404'), 404);
// });

// Route::get('/500', function(){
//     return response(view('errors.500'), 500);
// });


