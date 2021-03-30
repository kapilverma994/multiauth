<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin Routes


Route::get('admin', 'Admin\LoginController@showlogin')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');



Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');  
    Route::get('/home', 'AdminController@index');
        
});

