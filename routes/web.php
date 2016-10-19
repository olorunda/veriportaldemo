<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PanelistController@panelist');

Route::get('/dashboard', 'PanelistController@index');

Route::get('/panelists', ['middleware'=>'role', 'uses'=>'PanelistController@panelist']);

Route::post('/panelists', 'PanelistController@send');

Route::post('/rate', 'PanelistController@rate');

Route::post('/rate1', 'PanelistController@rate1');

Route::get('/comments/{refnum}', 'PanelistController@comments');

Route::get('/panelapprating', 'PanelistController@getrate');

Route::get('/rate2', 'PanelistController@rateTable');

Route::post('/checkrate', 'PanelistController@checkrate');

Route::post('/documents', 'PanelistController@getdocuments');

Route::get('/checkmail', 'PanelistController@checkmail');

Route::post('/editmember', 'PanelistController@editmember');

Route::post('/deletemember', 'PanelistController@deletemember');

Route::post('/checkskill', 'PanelistController@checkskill');

Route::post('/addskill', 'PanelistController@addskill');

Route::post('/editskill', 'PanelistController@editskill');

Route::post('/deleteskill', 'PanelistController@deleteskill');

Route::post('/rateTable', 'PanelistController@rateTable');

Auth::routes();

Route::get('/home', 'HomeController@index');
