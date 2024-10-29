<?php

namespace App\Services;

use App\Repositories\MdLunch;
use Illuminate\Support\Facades\DB;

class MdLunchService extends MdLunch
{
    /**
     * @return array|\Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        $data = MdLunch::listAllHome();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        //        return fill_chunck($data, 5);
        return multiple_array($data, 4);
    }

    public static function listAll()
    {
        $data = MdLunch::listAll();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }

    public static function listSponsorSchedule($id, $type, $size = 15)
    {
        $data = MdLunch::listSponsorSchedule($id, $type);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return multiple_array($data, $size);
    }
}
