<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 04/06/2015
 * Time: 21:24
 */

namespace App\Http\Controllers;


use App\Models\Series;
use App\Services\UserSeriesWatcher;
use Illuminate\Support\MessageBag;
use Auth;
use Input;

class SeriesController extends Controller {

    protected $userSeriesWatcher;

    public function __construct(UserSeriesWatcher $userSeriesWatcher) {
        $this->userSeriesWatcher = $userSeriesWatcher;
    }

    public function detail(Series $series) {
        /*
         * Check if the user (if logged in) is watching this series
         */
        $userIsWatchingSeries = false;
        if(Auth::check()) {
            $userIsWatchingSeries = $this->userSeriesWatcher->isWatchingSeries(Auth::user(), $series);
        }

        return view('series.detail')
            ->with('series', $series)
            ->with('userIsWatchingSeries', $userIsWatchingSeries);
    }

    public function watch(Series $series) {
        if(!$this->userSeriesWatcher->isWatchingSeries(Auth::user(), $series)) {
            $this->userSeriesWatcher->watchSeries(Auth::user(), $series);
        }

        return redirect($series->present()->url)
            ->with('success', new MessageBag([ 'You are now watching this series!' ]));
    }

    public function unwatch(Series $series) {
        if($this->userSeriesWatcher->isWatchingSeries(Auth::user(), $series)) {
            $this->userSeriesWatcher->unwatchSeries(Auth::user(), $series);
        }

        return redirect($series->present()->url)
            ->with('success', new MessageBag([ 'You are no longer watching this series!' ]));
    }

    public function edit(Series $series) {
        $old = Input::old();
    }

}