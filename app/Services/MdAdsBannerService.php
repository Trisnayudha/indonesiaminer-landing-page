<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\MdAdsBanner;

class MdAdsBannerService extends MdAdsBanner
{
    // TODO : Make your own service method
    public static function findRandom()
    {
        $data = MdAdsBanner::findRandom();
        if ($data) {
            $data->image = (!empty($data->image) ? asset($data->image) : '');
        }
        return $data;
    }

    public static function listAds()
    {
        $data = MdAdsBanner::listAds();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }
}
