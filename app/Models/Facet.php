<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 04/06/2015
 * Time: 00:35
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;

class Facet extends Model {

    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = 'App\\Presenters\\FacetPresenter';

    public function scopeType($query, $type) {
        $query
            ->join('series_facet', 'series_facet.facet_id', '=', 'facets.id')
            ->where('series_facet.type', '=', $type)
            ->groupBy('facets.id');

        return $query;
    }

    public function scopeSearch($query, $search) {
        $query->where('facets.name', 'LIKE', '%'.$search.'%');

        return $query;
    }

}