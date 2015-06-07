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

    public function watchUrl() {
        return route('series.watch', [ 'series' => $this->id, 'slug' => str_slug($this->title) ]);
    }

    public function unwatchUrl() {
        return route('series.unwatch', [ 'series' => $this->id, 'slug' => str_slug($this->title) ]);
    }

    public function editUrl() {
        return route('series.edit', [ 'series' => $this->id, 'slug' => str_slug($this->title) ]);
    }

    public function editReleasesUrl() {
        return route('series.releases.edit', [ 'series' => $this->id, 'slug' => str_slug($this->title) ]);
    }

    public function alternativeTitles() {
        $facets = [ ];

        foreach($this->facets as $facet) {
            if($facet->pivot->type === 'title') {
                $facets[] = $facet->name;
            }
        }

        return $facets;
    }

    public function staff() {
        $facets = [ ];

        foreach($this->facets as $facet) {
            if(in_array($facet->pivot->type, [ 'author', 'artist' ])) {
                $facets[] = [ 'name' => $facet->name, 'type' => $facet->present()->type ];
            }
        }

        return $facets;
    }

    public function genres() {
        $facets = [ ];

        foreach($this->facets as $facet) {
            if($facet->pivot->type === 'genre') {
                $facets[] = $facet->name;
            }
        }

        return $facets;
    }

    public function tags() {
        $facets = [ ];

        foreach($this->facets as $facet) {
            if($facet->pivot->type === 'tag') {
                $facets[] = $facet->name;
            }
        }

        return $facets;
    }

    public function groupedStaff() {
        $facets = [ ];

        foreach($this->facets as $facet) {
            if(in_array($facet->pivot->type, [ 'author', 'artist' ])) {
                if(!in_array($facet->name, $facets)) {
                    $facets[] = $facet->name;
                }
            }
        }

        return $facets;
    }

}