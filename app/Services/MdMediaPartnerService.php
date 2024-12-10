<?php

namespace App\Services;

use App\Helpers\General;
use App\Repositories\MdMediaPartner;
use Illuminate\Support\Facades\DB;

class MdMediaPartnerService extends MdMediaPartner
{
    /**
     * @return array|\Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        $data = MdMediaPartner::listAllHome();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ?  'https://indonesiaminer.com/' . $row->image : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        return General::multiple_array($data,  7);
    }
    public static function listAllHome2024()
    {
        $data = MdMediaPartner::listAllHome2024();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/' . $row->image : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        return General::multiple_array($data,  24);
    }

    public static function listAll()
    {
        $data = MdMediaPartner::listAll();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }
}
