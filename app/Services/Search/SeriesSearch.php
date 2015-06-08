<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 08/06/2015
 * Time: 12:11
 */

namespace App\Services\Search;


class SeriesSearch extends SphinxSearch {

    public function search($term, $options = null) {
        $query = $this->createQuery();
        $query->select()
            ->from('index_manga_series');

        $query->match('*', $query->halfEscapeMatch($term));

        $result = $query->execute();
        $ids = array_column($result, 'id');

        dd($ids);
    }
}