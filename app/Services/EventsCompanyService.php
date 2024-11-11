<?php

namespace App\Services;

use App\Helpers\General;
use App\Repositories\MsCompanyCategory;
use App\Traits\Directory;
use Illuminate\Support\Facades\DB;
use App\Repositories\EventsCompany;

class EventsCompanyService extends EventsCompany
{
    use Directory;

    public static function paginateWithFilterNew($search, $filter, $company = null)
    {
        $data = parent::paginateWithFilterNew($search, $filter, $company);
        foreach ($data as $x => $row) {
            $row->date_start = (!empty($row->date_start) ? date('d M Y', strtotime($row->date_start)) : '');
            $row->date_end = (!empty($row->date_end) ? date('d M Y', strtotime($row->date_end)) : '');
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }

    public static function paginateWithFilter($events_id, $search, $country, $category, $special_tags, $filter = null)
    {
        $data = parent::paginateWithFilter($events_id, $search, $country, $category, $special_tags, $filter);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->video_thumbnail = (!empty($row->video_thumbnail) ? asset($row->video_thumbnail) : '');
            $row->video_url = (!empty($row->video_url) ? 'https://www.youtube.com/embed/' . YoutubeTakeID($row->video_url) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 150 ? substr(strip_tags($row->desc), 0,  150) . '...' : strip_tags($row->desc));
        }
        return $data;
    }

    public static function listWithCounter($events_id)
    {
        $data = MsCompanyCategory::showAll();
        foreach ($data as $x => $row) {
            $row->counter = parent::counterCategoryCompany($row->id, $events_id);
        }
        return $data;
    }

    public static function paginateWithFilterMining($events_id, $search, $category, $special_tags, $filter = null)
    {
        $data = parent::paginateWithFilterMining($events_id, $search, $category, $special_tags, $filter);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->video_thumbnail = (!empty($row->video_thumbnail) ? asset($row->video_thumbnail) : '');
            $row->video_url = (!empty($row->video_url) ? 'https://www.youtube.com/embed/' . YoutubeTakeID($row->video_url) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 150 ? substr(strip_tags($row->desc), 0,  150) . '...' : strip_tags($row->desc));
            $row->isBookmark = self::isBookmark('Company', $row->id);
            $row->isLogin = self::isLogin();
        }
        return $data;
    }

    public static function listExhibitionSponsor($id, $size = 50)
    {
        $data = EventsCompany::findAllByExhibitor($id);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/' . $row->image : '');
        }
        return General::multiple_array($data,  50);
    }
}
