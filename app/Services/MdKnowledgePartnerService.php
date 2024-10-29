<?php

namespace App\Services;

use App\Repositories\MdKnowledgePartner;
use Illuminate\Support\Facades\DB;

class MdKnowledgePartnerService extends MdKnowledgePartner
{
    /**
     * @return array|\Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        $data = MdKnowledgePartner::listAllHome();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        return multiple_array($data, 24);
    }
    public static function listAllHome2024()
    {
        $data = MdKnowledgePartner::listAllHome2024();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->link = (!empty($row->link) ? $row->link : '#');
        }

        return multiple_array($data, 24);
    }

    public static function listAll()
    {
        $data = MdKnowledgePartner::listAll();
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }
    public static function listSponsorSchedule($id, $type, $size = 15)
    {
        $data = MdKnowledgePartner::listSponsorSchedule($id, $type);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return multiple_array($data, $size);
    }
}
