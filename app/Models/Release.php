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

    public function toArray() {
        $result = parent::toArray();

        $result['downloadUrl'] = $this->present()->downloadUrl;

        return $result;
    }

    public static function getAllowedTypes() {
        return [
            'zip', 'rar', 'cbz', '7z', 'txt', 'jpg', 'png',
            'bmp', 'cbr', 'md5', 'pdf', 'epub', 'jpeg', 'docx',
            'doc', 'odf', 'mobi'
        ];
    }

}