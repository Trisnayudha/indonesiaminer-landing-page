<?php

namespace App\Services;

use App\Helpers\General;
use App\Repositories\MdAssociation;
use Illuminate\Support\Facades\DB;

class MdAssociationService extends MdAssociation
{
    /**
     * @return array|\Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        $data = MdAssociation::listAllHome();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        //        return fill_chunck($data, 5);
        return multiple_array($data, 7);
    }
    public static function listAllHome2024()
    {
        $data = MdAssociation::listAllHome2024();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/' . $row->image : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        //        return fill_chunck($data, 5);
        return General::multiple_array($data,  7);
    }

    public static function listAll()
    {
        $data = MdAssociation::listAll();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }
}
