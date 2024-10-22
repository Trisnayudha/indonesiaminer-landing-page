<?php

namespace App\Repositories;

use App\Models\MdAdsBannerModel;
use Illuminate\Support\Facades\DB;

class MdAdsBanner extends MdAdsBannerModel
{
    // TODO : Make your own query methods
    public static function findRandom()
    {
        $data = DB::table('md_ads_banner')->inRandomOrder()->first();

        return $data;
    }

    public static function listAds()
    {
        return DB::table('md_ads_banner')
            ->select(
                'md_ads_banner.id',
                'md_ads_banner.image',
                'md_ads_banner.link'
            )
            ->orderby('md_ads_banner.id', 'desc')
            ->get();
    }
}
