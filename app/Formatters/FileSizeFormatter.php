<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 07/06/2015
 * Time: 01:15
 */

namespace App\Formatters;


class FileSizeFormatter {

    public static function format($input) {
        if($input === 0) {
            return '0';
        }

        $base = log($input) / log(1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');
        $suffix = $suffixes[floor($base)];
        return number_format(pow(1024, $base - floor($base)), 0) . $suffix;
    }
}