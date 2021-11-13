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
Route::get('/sign-in', 'Guest\Home@signin');
Route::post('/sign-in', 'Guest\Home@signin_now');

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

        // investors aspect
        Route::get('/create-investor', 'Investors@create_investor');
        Route::post('/create-investor', 'Investors@create_investor_now');
        Route::get('/view-investors', 'Investors@view_investors');
        Route::get('/view-investors-under/{a_id}', 'Investors@view_investors_under');
        Route::get('/edit-investor/{i_id}', 'Investors@edit_investor');
        Route::post('/edit-investor/{i_id}', 'Investors@edit_investor_now');


    });

});

// user aspect
Route::group(['namespace'=>'User'], function(){
    Route::get('/subscibe_now', 'Logic1@activate_subscription');
    Route::get('/callback1', 'Logic1@validate_payment');
    Route::get('/my-transaction', 'Logic1@my_transaction');



    // bottom side for dynamic category route and it content
    Route::get('/{route_name}', 'Logic1@view_categories');
});
