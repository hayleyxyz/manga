<?php
/**
 * Created by PhpStorm.
 * User: Oscar
 * Date: 07/06/2015
 * Time: 01:02
 */

namespace App\Presenters;


use App\Formatters\FileSizeFormatter;
use App\Formatters\TimeSpanFormatter;
use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class ReleasePresenter extends Presenter {

    public function downloadUrl() {
        return route('release.download', [ 'release' => $this->id, 'file' => rawurlencode($this->name) ]);
    }

    public function fileSize() {
        return FileSizeFormatter::format($this->size);
    }

    public function uploadedAt() {
        $then = new Carbon($this->created_at);
        return TimeSpanFormatter::format($then);
    }

}