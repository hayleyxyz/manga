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

class Series extends Model {

    use SoftDeletes;

    public function facets() {
        return $this->belongsToMany('Facet')
            ->withPivot('type')
            ->withTimestamps();
    }

}