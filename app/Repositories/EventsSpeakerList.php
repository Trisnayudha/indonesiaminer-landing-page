<?php

namespace App\Repositories;

use App\Models\EventsSpeakerListModel;
use Illuminate\Support\Facades\DB;

class EventsSpeakerList extends EventsSpeakerListModel
{
    public static function saveSpeakerList($data_id, $tableid, $id, $name)
    {
        $count = self::countBy('events_id', $data_id);
        if ($count > 0 && empty($id)) {
            self::deleteBy('events_id', $data_id);
        }

        if (!empty($id)) {
            static::getTableId($data_id, $tableid);

            foreach ($id as $x => $row) {
                $row_table_id = $tableid[$x];
                $row_id = $row;
                $row_name = $name[$x];

                if (empty($row_table_id)) {
                    $save = new EventsSpeakerListModel();
                    $save->events_id = $data_id;
                    $save->events_speaker_id = $row_id;
                    $save->save();
                } else {
                    $update = EventsSpeakerListModel::findById($row_table_id);
                    $update->events_id = $data_id;
                    $update->events_speaker_id = $row_id;
                    $update->save();
                }
            }
        }
    }

    public static function getTableId($data_id, $tableid)
    {
        $list = [];
        foreach ($tableid as $row) {
            if (!empty($row)) {
                $list[] = $row;
            }
        }

        if (count($list) > 0) {
            static::deleteByMenuId($data_id, $list);
        }
    }

    public static function deleteByMenuId($data_id, $id)
    {
        $data = EventsSpeakerList::findAllBy('events_id', $data_id);

        foreach ($data as $x => $row) {
            if (!in_array($row->id, $id)) {
                EventsSpeakerList::deleteById($row->id);
            }
        }
    }

    public static function findAllBySpeaker($id)
    {
        return DB::table('events_speaker_list')
            ->select(
                'events_speaker_list.id as table_id',
                'events_speaker_list.events_speaker_id as id',
                'events_speaker.name as name',
                'events_speaker.position as position',
                'events_speaker.image as image',
                'events_speaker.bio_desc as bio_desc'
            )
            ->leftjoin('events_speaker', function ($join) {
                $join->on('events_speaker_list.events_speaker_id', '=', 'events_speaker.id');
            })
            ->where('events_speaker_list.events_id', $id)
            ->where(function ($q) {
                $q->orWhereNotNull('events_speaker.id');
            })
            ->orderby('events_speaker.id', 'asc')
            ->get();
    }

    public static function listSpeakerSchedule($id, $perPage = 8)

    {
        return DB::table('events_speaker_list')
            ->select(
                'events_speaker_list.id',
                'events_speaker_list.events_speaker_id as speaker_id',
                'events_speaker.name as name',
                'events_speaker.position as position',
                'events_speaker.company_name as company',
                'events_speaker.image as image',
                'events_speaker.bio_desc as desc',
                'events_speaker.linkedin',
                'events_speaker.twitter',
                'events_speaker.instagram'
            )
            ->leftjoin('events_speaker', function ($join) {
                $join->on('events_speaker_list.events_speaker_id', '=', 'events_speaker.id');
            })
            ->where('events_speaker_list.events_id', $id)
            ->where(function ($q) {
                $q->orWhereNotNull('events_speaker.id');
            })
            ->orderby('events_speaker_list.id', 'asc')
            ->get(); // Menggunakan paginate
    }
}
