<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 07/06/2015
 * Time: 01:00
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Release extends Model {

    use PresentableTrait;

    protected $presenter = 'App\\Presenters\\ReleasePresenter';

}