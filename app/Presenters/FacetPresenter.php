<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 06/06/2015
 * Time: 21:48
 */

namespace App\Presenters;


use Laracasts\Presenter\Presenter;

class FacetPresenter extends Presenter {

    public function type() {
        return ucfirst($this->pivot->type);
    }

}