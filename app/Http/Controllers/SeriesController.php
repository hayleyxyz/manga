<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 04/06/2015
 * Time: 21:24
 */

namespace App\Http\Controllers;


use App\Models\Series;
use App\Services\ReleaseUploader;
use App\Services\UserSeriesWatcher;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Auth;
use Input;
use Symfony\Component\HttpFoundation\Response;

class SeriesController extends Controller {

    /** @var UserSeriesWatcher $userSeriesWatcher */
    protected $userSeriesWatcher;

    /** @var ReleaseUploader $releaseUploader */
    protected $releaseUploader;

    public function __construct(UserSeriesWatcher $userSeriesWatcher, ReleaseUploader $releaseUploader) {
        $this->userSeriesWatcher = $userSeriesWatcher;
        $this->releaseUploader = $releaseUploader;
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

        return view('series.edit')
            ->with('series', $series);
    }

    public function save(Series $series) {
        $input = Input::all();
        $removedFacets = Input::get('removed_facets');

        if($removedFacets && is_array($removedFacets)) {
            $removedFacets = array_map('json_decode', $removedFacets);

        }

        dd($removedFacets);

        $series->fill($input['series']);
        $series->save();

        return redirect($series->present()->editUrl)
            ->with('success', new MessageBag([ 'Series saved successfully' ]));
    }

    public function editReleases(Series $series) {

        return view('series.releases.edit')
            ->with('series', $series);
    }

    public function saveReleases(Series $series) {

    }

    public function uploadRelease(Request $request, Series $series) {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $result = $this->releaseUploader->upload($file);

            dd($result);
        }

        $response = [ ];

        return response()->json($response, Response::HTTP_I_AM_A_TEAPOT);
    }

}