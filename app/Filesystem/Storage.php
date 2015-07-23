<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 18/07/15
 * Time: 02:19
 */

namespace App\Filesystem;


use App\Models\Release;

class Storage {

    public static function rootPath() {
        return config('storage.path');
    }

    public static function pathForRelease(Release $release) {
        $root = self::rootPath();

    }

    protected static function padId($id) {
        return str_pad($id, 6, '0', STR_PAD_LEFT);
    }

    protected static function staggerId($id) {
        $id = (int)$id;

        $a = self::padId($id - ($id % 10000));
        $b = self::padId($id - ($id % 1000));
        return $a.'/'.$b;
    }

}