<?php

Route::model('series', 'App\\Models\\Series');

Route::get('/', 'HomeController@home');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('series/{series}/{slug?}', [ 'as' => 'series.detail', 'uses' => 'SeriesController@detail' ]);