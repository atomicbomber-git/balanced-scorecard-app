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

Route::redirect('/', '/scorecards/index');

Route::group(['prefix' => '/scorecard', 'as' => 'scorecard.'], function() {
    Route::get('/index', 'ScorecardController@index')->name('index');
});

Route::group(['prefix' => '/scorecard_detail', 'as' => 'scorecard_detail.'], function() {
    Route::get('/index/{scorecard}', 'ScorecardDetailController@index')->name('index');
});
