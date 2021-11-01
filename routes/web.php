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

        // package aspect
        Route::get('/create-package', 'Packages@create_view');
        Route::post('/create-package', 'Packages@create_now');
        Route::get('/view-packages', 'Packages@view_packages');
        Route::get('/edit-package/{p_id}', 'Packages@edit_view');
        Route::post('/edit-package/{p_id}', 'Packages@edit_now');
        Route::get('/delete-package-other-image/{po_id}', 'Packages@delete_po_now');

        // workers
        Route::get('/create-worker', 'Workers@create_worker');
        Route::post('/create-worker', 'Workers@create_worker_now');
        Route::get('/view-workers', 'Workers@view_workers');
        Route::get('/edit-worker/{a_id}', 'Workers@edit_view');
        Route::post('/edit-worker/{a_id}', 'Workers@edit_now');

    });

});
