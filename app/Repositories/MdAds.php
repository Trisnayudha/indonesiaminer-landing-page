<?php
namespace App\Repositories;

use App\Models\MdAdsModel;
use Illuminate\Support\Facades\DB;

class MdAds extends MdAdsModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_ads')
            ->where('md_ads.id', $id)
            ->first();

        return new static($find);
    }

    public static function listAds()
    {
        return DB::table('md_ads')
            ->select(
                'md_ads.id',
                'md_ads.image',
                'md_ads.link'
            )
            ->orderby('md_ads.sort', 'desc')
            ->get();
    }

    public static function listLimitAds()
    {
        return DB::table('md_ads')
            ->select(
                'md_ads.id',
                'md_ads.image',
                'md_ads.link'
            )
            ->orderby('md_ads.sort', 'desc')
            ->limit(6)
            ->get();
    }
}
