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

Route::get('/', 'IssueController@index')->name('home');

Auth::routes(['register'=>false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/issue', 'IssueController', ['except' => ['index', 'show']]);
    Route::resource('/categories', 'CategoryController');
});

Route::get('/issue/{id}', 'IssueController@show')->name('issues.show');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function(){
    Route::resource('/manage-users', 'Admin\ManageUserController');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/ckfinder/browser', 'CKFinder\CKFinderController@browserAction');
});