<?php

namespace App\Services;

use App\Repositories\EventsScheduleSpeaker;
use Illuminate\Support\Facades\DB;

class EventsScheduleSpeakerService extends EventsScheduleSpeaker
{
    public static function findAllBySpeaker($id)
    {
        $data = EventsScheduleSpeaker::findAllBySpeaker($id);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/' . $row->image : '');
        }
        return $data;
    }

    public static function listSpeakerSchedule($id)
    {
        $data = EventsScheduleSpeaker::listSpeakerSchedule($id);
        foreach ($data as $x => $row) {
            $row->image = (!empty($row->image) ? 'https://indonesiaminer.com/' . $row->image : '');
        }
        return $data;
    }
}
