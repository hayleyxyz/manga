<?php

/*
 * Route parameter-model bindings
 */
Route::model('series', \App\Models\Series::class);
Route::model('release', \App\Models\Release::class);

/*
 * Index page
 */
Route::get('/', 'HomeController@home');

/*
 * Authentication/password reset
 */
Route::controllers([ 'auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController' ]);

/*
 * Routes for a specific series
 */
Route::group([ 'prefix' => 'series/{series}/{slug}', 'as' => 'series.' ], function() {

    // Series detail
    Route::get('/', [ 'as' => 'detail', 'uses' => 'SeriesController@detail' ]);

    /*
     * Routes requiring authentication
     */
    Route::group([ 'middleware' => 'auth' ], function() {

        // Watch / unwatch
        Route::post('watch', [ 'as' => 'watch', 'uses' => 'SeriesController@watch' ]);
        Route::post('unwatch', [ 'as' => 'unwatch', 'uses' => 'SeriesController@unwatch' ]);

        // Edit series
        Route::get('edit', [ 'as' => 'edit', 'uses' => 'SeriesController@edit' ]);

        // Save series
        Route::post('save', [ 'as' => 'save', 'uses' => 'SeriesController@save' ]);

        /*
         * Releases
         */
        Route::group([ 'prefix' => 'releases', 'as' => 'releases.' ], function() {

            // Edit
            Route::get('edit', [ 'as' => 'edit', 'uses' => 'SeriesController@editReleases' ]);

            // Save
            Route::post('save', [ 'as' => 'save', 'uses' => 'SeriesController@saveReleases' ]);

            // Upload
            Route::post('/pload', [ 'as' => 'upload', 'uses' => 'SeriesController@uploadRelease' ]);
        });
    });
});

/*
 * Facets
 */
Route::group([ 'prefix' => 'facets', 'as' => 'facets.' ], function() {

    // Autocomplete
    Route::get('autocomplete', [ 'as' => 'autocomplete', 'uses' => 'SeriesController@facetsAutocomplete' ]);
});

/*
 * Release download
 */
Route::get('download/{release}/{file}', [ 'as' => 'release.download', 'uses' => 'SeriesController@downloadRelease' ]);