<?php

namespace App\Services;

use App\Repositories\MdRegistration;
use Illuminate\Support\Facades\DB;

class MdRegistrationService extends MdRegistration
{
    /**
     * @return array|\Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        $data = MdRegistration::listAllHome();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        //        return fill_chunck($data, 5);
        return multiple_array($data, 4);
    }

    public static function listAll()
    {
        $data = MdRegistration::listAll();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }

    public static function listSponsorSchedule($id, $type, $size = 15)
    {
        $data = MdRegistration::listSponsorSchedule($id, $type);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return multiple_array($data, $size);
    }
}
