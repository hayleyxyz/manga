<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 06/06/2015
 * Time: 22:26
 */

namespace App\Services;


use App\Models\Series;
use App\Models\User;

class UserSeriesWatcher {

    /**
     * Check if the provided user is watching the provided series
     * @param \App\Models\User $user
     * @param \App\Models\Series $series
     * @return bool
     */
    public function isWatchingSeries(User $user, Series $series) {
        $count = $user
            ->series()
            ->where('series_id', $series->id)
            ->count();

        return ($count > 0);
    }

    /**
     * Watch the provided series for user
     * @param \App\Models\User $user
     * @param \App\Models\Series $series
     */
    public function watchSeries(User $user, Series $series) {
        $user->series()->attach($series->id);
    }

    /**
     * Unwatch the provided series for user
     * @param \App\Models\User $user
     * @param \App\Models\Series $series
     */
    public function unwatchSeries(User $user, Series $series) {
        $user->series()->detach($series);
    }

}