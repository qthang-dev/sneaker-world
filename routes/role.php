<?php

Route::group(['prefix' => 'roles'], function() {
    Route::get('/', 'RoleController@index');
    Route::post('/', 'RoleController@store');
    Route::put('/{uuid}', 'RoleController@update');
    Route::delete('/{uuid}', 'RoleController@destroy');
});