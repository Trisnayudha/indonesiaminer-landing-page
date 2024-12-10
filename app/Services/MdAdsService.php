<?php

namespace App\Services;

use App\Repositories\MdAds;
use Illuminate\Support\Facades\DB;

class MdAdsService extends MdAds
{
    public static function listAds()
    {
        $data = MdAds::listAds();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }

    public static function listLimitAds()
    {
        $data = MdAds::listLimitAds();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset('storage/' . $row->image) : '');
        }
        return $data;
    }
}
