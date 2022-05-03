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

Route::group(['prefix' => 'admin'], function () {
    //auth admin================================================================
    Route::get('/login', 'admin\auth\LoginController@login')->name('admin.auth.login');
    Route::post('/post-login', 'admin\auth\LoginController@postLogin')->name('admin.auth.postLogin');
    Route::get('/logout', 'admin\auth\LoginController@logout')->name('admin.auth.logout');
    //admin dashboard============================================================
    
    Route::group(['middleware' => ['LoginMiddleware', 'adminChecking']], function () {
        //dashboard
        Route::get('/dashboard', 'admin\DashboardController@showDashboard')->name('admin.account_user');
        //user
        Route::group(['prefix' => 'user'], function () {
            Route::get('/list', 'admin\AccountUserController@listAccountUser')->name('admin.account_user');
        });
        //dự án
        Route::group(['prefix' => 'project'], function () {
            Route::get('/list', 'admin\ProjectController@listProject')->name('admin.listProject');
            Route::get('/add', 'admin\ProjectController@showAddProject')->name('admin.showAddProject');
        });
        //tin tức
        Route::group(['prefix' => 'news'], function () {
            Route::get('/list', 'admin\NewsController@listNews')->name('admin.listNews');
            Route::get('/add', 'admin\NewsController@showAddNews')->name('admin.showAddNews');
        });
        
    });
});