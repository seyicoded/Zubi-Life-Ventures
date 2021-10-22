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

Route::get('/', 'Guest\Home@home');

// user aspect

// Admin aspect
Route::group(['namespace'=>'Admin', 'prefix' => 'admin'], function(){

    Route::get('/login', function () {
        return view('admin.signin');
    });
    Route::post('/login', 'Auth@login_admin');
    Route::post('/logout', 'Auth@logout_now');

    Route::group(['middleware'=>'admin_auth'], function(){
        Route::get('/', function () {
            return view('admin.home');
        });

        // category aspect
        Route::get('/create-category', 'Categories@create_view');
        Route::post('/create-category', 'Categories@create_now');
        Route::get('/view-category', 'Categories@view_all');
        Route::get('/edit-category/{c_id}', 'Categories@edit_view');
        Route::post('/edit-category/{c_id}', 'Categories@edit_now');

    });

});
