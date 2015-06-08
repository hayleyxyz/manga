<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 08/06/2015
 * Time: 12:11
 */

namespace App\Services\Search;


use Foolz\SphinxQL\Connection;
use Foolz\SphinxQL\SphinxQL;

abstract class SphinxSearch {

    public abstract function search($term, $options = null);

    /**
     * Create SphinxQL instance
     * @return SphinxQL
     */
    protected function createQuery() {
        $conn = new Connection();
        $conn->setParams(\Config::get('sphinxql'));
        $query = SphinxQL::create($conn);
        return $query;
    }

}