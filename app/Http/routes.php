<?php

/*
 * Route parameter-model bindings
 */
Route::model('series', 'App\\Models\\Series');
Route::model('release', 'App\\Models\\Release');

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

        /*
         * Save series
         */
        Route::post('save', [ 'as' => 'series.save', 'uses' => 'SeriesController@save' ]);

        /*
         * Edit releases
         */
        Route::get('releases/edit', [ 'as' => 'series.releases.edit', 'uses' => 'SeriesController@editReleases' ]);

        /*
         * Save releases
         */
        Route::post('releases/save', [ 'as' => 'series.releases.save', 'uses' => 'SeriesController@saveReleases' ]);

        /*
         * Upload release
         */
        Route::post('releases/upload', [ 'as' => 'series.releases.upload', 'uses' => 'SeriesController@uploadRelease' ]);

    });

});

/*
 * Release download
 */
Route::get('download/{release}/{file}', [ 'as' => 'release.download', 'uses' => 'SeriesController@downloadRelease' ]);