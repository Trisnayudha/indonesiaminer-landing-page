<?php

namespace App\Services;

use App\Repositories\EventsSchedule;
use App\Traits\Directory;
use Illuminate\Support\Facades\DB;

class EventsScheduleService extends EventsSchedule
{
    use Directory;

    public static function listSchedule($id)
    {
        return self::formatScheduleData(EventsSchedule::listSchedule($id));
    }

    public static function listWorkshop($id)
    {
        return self::formatScheduleData(EventsSchedule::listWorkshop($id));
    }

    public static function listMinistage($id)
    {
        return self::formatScheduleData(EventsSchedule::listMinistage($id));
    }

    private static function formatScheduleData($data)
    {
        $no = 1;
        $today = new \DateTime(date('Y-m-d'));
        $list = [];

        foreach ($data as $date) {
            $dateEvents = new \DateTime(date('Y-m-d', strtotime($date)));
            $isToday = $today == $dateEvents;

            $list[] = [
                'id' => $no,
                'date' => $date,
                'isToday' => $isToday,
                'day' => ucwords(self::toOrdinal($no++) . " Day"),
                'date_format' => date('d M Y', strtotime($date)),
            ];
        }
        return $list;
    }

    public static function listScheduleByDate($id, $date, $events_id = null)
    {
        return self::formatDetailedScheduleData(EventsSchedule::listScheduleByDate($id, $date, $events_id), $events_id);
    }

    public static function listWorkshopByDate($id, $date, $events_id = null)
    {
        return self::formatDetailedScheduleData(EventsSchedule::listWorkshopByDate($id, $date, $events_id), $events_id);
    }

    public static function listMinistageByDate($id, $date, $events_id = null)
    {
        return self::formatDetailedScheduleData(EventsSchedule::listMinistageByDate($id, $date, $events_id), $events_id);
    }

    private static function formatDetailedScheduleData($data, $events_id)
    {
        foreach ($data as $row) {
            $row->sponsor_image = !empty($row->sponsor_image) ? 'https://indonesiaminer.com/' . $row->sponsor_image : '';
            $row->time_start = !empty($row->time_start) ? date('H:i A', strtotime($row->time_start)) : '';
            $row->time_end = !empty($row->time_end) ? date('H:i A', strtotime($row->time_end)) : '';
            // $row->isBookmark = self::isBookmark('Conference Agenda', $row->id, $events_id);
            $row->speaker = EventsScheduleSpeakerService::listSpeakerSchedule($row->id);
        }
        return $data;
    }

    private static function toOrdinal($number)
    {
        // Converts a number to an ordinal string, e.g., 1 -> "1st", 2 -> "2nd"
        $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
        if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
            return $number . 'th';
        }
        return $number . $ends[$number % 10];
    }
}
