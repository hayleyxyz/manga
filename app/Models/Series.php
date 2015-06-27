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

class Series extends Model {

    use SoftDeletes;
    use PresentableTrait;

    protected $presenter = 'App\\Presenters\\SeriesPresenter';

    protected $fillable = [ 'title', 'year' ];

    public function facets() {
        return $this->belongsToMany('App\\Models\\Facet', 'series_facet')
            ->withPivot('type')
            ->withTimestamps();
    }

//    public function genres() {
//        return $this->facets()
//            ->wherePivot('type', '=', 'genre');
//    }

    public function releases() {
        return $this->hasMany('App\\Models\\Release');
    }

}