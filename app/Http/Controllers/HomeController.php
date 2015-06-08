<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 02/06/2015
 * Time: 22:29
 */

namespace App\Http\Controllers;


use App\Models\Series;
use App\Services\Search\SeriesSearch;
use Foolz\SphinxQL\Connection;
use Foolz\SphinxQL\SphinxQL;

class HomeController extends Controller {

    /* @var SeriesSearch $seriesSearch */
    protected $seriesSearch;

    public function __construct(SeriesSearch $seriesSearch) {
        $this->middleware('auth');

        $this->seriesSearch = $seriesSearch;
    }

    public function home() {
        $series = Series::paginate(10);
        
        return view('home')
            ->with('seriesResults', $series);
    }

}