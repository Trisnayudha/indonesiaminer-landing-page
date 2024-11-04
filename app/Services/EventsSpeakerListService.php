<?php

namespace App\Services;

use App\Repositories\EventsSpeakerList;
use Illuminate\Support\Facades\DB;

class EventsSpeakerListService extends EventsSpeakerList
{
    public static function findAllBySpeaker($id)
    {
        $data = EventsSpeakerList::findAllBySpeaker($id);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? asset($row->image) : '');
        }
        return $data;
    }

    public static function listSpeakerSchedule($id, $perPage = 12)
    {
        $data = EventsSpeakerList::listSpeakerSchedule($id, $perPage);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/' . $row->image : '');
            $row->desc = (strlen($row->desc) > 200 ? substr($row->desc, 0, 200) . '...' : $row->desc);
        }
        return $data;
    }
}
