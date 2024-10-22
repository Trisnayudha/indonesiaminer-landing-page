<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsBanner extends News
{
    // TODO : Make your own query methods
    public static function listAll()
    {
        $data = DB::table('news_banner')
            ->select([
                'news.*'
            ])
            ->join('news', 'news.id', '=', 'news_banner.news_id')
            ->orderBy('news_banner.sort', 'asc')
            ->get();

        return $data;
    }

    public static function listAllToArray()
    {
        $data = DB::table('news_banner')
            ->select([
                'news.*'
            ])
            ->join('news', 'news.id', '=', 'news_banner.news_id')
            ->orderBy('news_banner.sort', 'asc')
            ->pluck('news.id')
            ->toArray();

        return $data;
    }
}
