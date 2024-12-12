<?php

namespace App\Services;

use App\Helpers\General;
use App\Repositories\MdSponsor;
use Illuminate\Support\Facades\DB;

class MdSponsorService extends MdSponsor
{
    /**
     * @param $type
     * @param $size
     * @return array|\Illuminate\Support\Collection
     */
    public static function listAllHome($type, $size = 24)
    {
        $data = MdSponsor::listAllHome($type);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ?  'https://indonesiaminer.com/storage/' . $row->image : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        return General::multiple_array($data,  $size);
    }
    public static function listAllHome2024($type, $size = 24)
    {
        $data = MdSponsor::listAllHome2024($type);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/storage/' . $row->image : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        return General::multiple_array($data,  $size);
    }

    public static function listAll()
    {
        $data = MdSponsor::listAll();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }

    public static function listById($id)
    {
        $data = MdSponsor::listById($id);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }
}
