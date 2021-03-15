<?php

Route::apiResource('class', 'API\ClassController');
Route::apiResource('subject', 'API\subjectController');
Route::apiResource('teacher', 'API\TeacherController');
Route::post('/test', 'API\TestController@test');
Route::get('/check', 'API\TestController@index');
Route::put('update/{id}', 'API\TestController@update');
Route::delete('destroy/{id}', 'API\TestController@destroy');
Route::get('show/{id}', 'API\TestController@show');


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
