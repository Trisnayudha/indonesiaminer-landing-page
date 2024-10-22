<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Repositories\NewsBanner;

class NewsBannerService extends NewsBanner
{
    // TODO : Make your own service method
    public static function listAll()
    {
        $data = NewsBanner::listAll();
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title,0,  100).'...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc),0,  50).'...' : strip_tags($row->desc));
        }
        return $data;
    }

    public static function listAllToArray()
    {
        $data = NewsBanner::listAllToArray();
        return $data;
    }
}