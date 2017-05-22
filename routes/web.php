<?php

Auth::routes();

Route::get('/', 'QuestionController@index');
Route::get('/home', 'QuestionController@index');
Route::get('/question', 'QuestionController@index');
Route::get('/question/{id}', 'QuestionController@show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/question/create', 'QuestionController@create');
    Route::post('/question', 'QuestionController@store');
    Route::post('/question/response/{id}', 'QuestionController@response');
});