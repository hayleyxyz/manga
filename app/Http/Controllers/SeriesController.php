<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 04/06/2015
 * Time: 21:24
 */

namespace App\Http\Controllers;


use App\Models\Series;

class SeriesController extends Controller {

    public function detail(Series $series) {

        return view('series.detail')
            ->with('series', $series);
    }

}