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

}