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
        return $this->createSeriesUrl('series.detail');
    }

    public function watchUrl() {
        return $this->createSeriesUrl('series.watch');
    }

    public function unwatchUrl() {
        return $this->createSeriesUrl('series.unwatch');
    }

    public function editUrl() {
        return $this->createSeriesUrl('series.edit');
    }

    public function saveUrl() {
        return $this->createSeriesUrl('series.save');
    }

    public function editReleasesUrl() {
        return $this->createSeriesUrl('series.releases.edit');
    }

    public function saveReleasesUrl() {
        return $this->createSeriesUrl('series.releases.save');
    }

    public function uploadReleaseUrl() {
        return $this->createSeriesUrl('series.releases.upload');
    }

    protected function createSeriesUrl($routeName) {
        return route($routeName, [ 'series' => $this->id, 'slug' => str_slug($this->title) ]);
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