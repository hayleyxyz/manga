<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 04/06/2015
 * Time: 21:20
 */

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class SeriesPresenter extends Presenter {

    public function titleWithYear() {
        $title = $this->title;

        if($this->year) {
            $title .= ' ['.$this->year.']';
        }

        return $title;
    }

    public function url() {
        return route('series.detail', [ 'series' => $this->id, 'slug' => str_slug($this->title) ]);
    }

    public function alternativeTitles() {
        $titles = [ ];

        foreach($this->facets as $facet) {
            if($facet->pivot->type === 'title') {
                $titles[] = $facet->name;
            }
        }

        return $titles;
    }

}