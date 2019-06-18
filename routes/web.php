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

Route::any('/issue/search/', 'IssueController@search')->name('issue.search');

Route::get('/tags/list', 'TagController@list')->name('tags.list');

Route::get('/tags/{id}/issues', 'TagController@issues')->name('tags.issues');

Route::get('/categories/list', 'CategoryController@list')->name('categories.list');

Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');

Route::get('/issue/{id}', 'IssueController@show')->name('issue.show');

Route::get('/issue', function(){ return redirect(route('home')); });

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/issue', 'IssueController', ['except' => ['index', 'show']]);
    Route::get('/issue/{id}/delete', 'IssueController@delete')->name('issue.delete');
    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
    Route::get('/ckfinder/browser', 'CKFinder\CKFinderController@browserAction');
    Route::resource('/tags', 'TagController', ['except' => ['show']]);
    Route::get('/tags/{id}/delete', 'TagController@delete')->name('tags.delete');
    Route::post('/comment', 'CommentController@store')->name('comment.store');
    Route::delete('/comment/{id}/destroy', 'CommentController@destroy')->name('comment.destroy');
    Route::post('/comment/{id}/reply', 'ReplyController@store');
    Route::delete('/reply/{id}/destroy', 'ReplyController@destroy')->name('reply.destroy');
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth','admin']], function(){
    Route::resource('/manage-users', 'Admin\ManageUserController');
});