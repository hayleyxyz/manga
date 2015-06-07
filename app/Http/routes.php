<?php

/*
 * Route parameter-model bindings
 */
Route::model('series', 'App\\Models\\Series');

/*
 * Index page
 */
Route::get('/', 'HomeController@home');

/*
 * Authentication/password reset
 */
Route::controllers([ 'auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController' ]);

/*
 * Routes for a sepecific series
 */
Route::group([ 'prefix' => 'series/{series}/{slug}' ], function() {

    /*
     * Series detail page
     */
    Route::get('/', [ 'as' => 'series.detail', 'uses' => 'SeriesController@detail' ]);

    /*
     * Routes requiring authentication
     */
    Route::group([ 'middleware' => 'auth' ], function() {

        /*
         * Watch/unwatch series
         */
        Route::post('watch', [ 'as' => 'series.watch', 'uses' => 'SeriesController@watch' ]);
        Route::post('unwatch', [ 'as' => 'series.unwatch', 'uses' => 'SeriesController@unwatch' ]);

        /*
         * Edit series
         */
        Route::get('edit', [ 'as' => 'series.edit', 'uses' => 'SeriesController@edit' ]);

    });

});

