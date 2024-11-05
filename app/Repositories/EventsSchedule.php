<?php

namespace App\Repositories;

use App\Models\EventsScheduleModel;
use Illuminate\Support\Facades\DB;

class EventsSchedule extends EventsScheduleModel
{
    public static function detailForm($id)
    {
        return DB::table('events_schedule')
            ->select(
                'events_schedule.id',
                'events_schedule.name',
                'events_schedule.status',
                'events_schedule.date_events',
                'events_schedule.time_start',
                'events_schedule.time_end',
                'events_schedule.desc',
                'events.name as events_name',
                'md_sponsor.name as sponsor_name'
            )
            ->leftJoin('events', 'events.id', '=', 'events_schedule.events_id')
            ->leftJoin('md_sponsor', 'md_sponsor.id', '=', 'events_schedule.md_sponsor_id')
            ->where('events_schedule.id', $id)
            ->first();
    }

    public static function listSchedule($id)
    {
        return self::listByType($id, 'conference');
    }

    public static function listWorkshop($id)
    {
        return self::listByType($id, 'workshop');
    }

    public static function listMinistage($id)
    {
        return self::listByType($id, 'showcase');
    }

    private static function listByType($id, $type)
    {
        return DB::table('events_schedule')
            ->select(DB::raw('ANY_VALUE(events_schedule.events_id) as events_id'), 'events_schedule.date_events as date')
            ->where('events_schedule.status', $type)
            ->when($id, function ($query) use ($id) {
                $query->where('events_schedule.events_id', $id);
            })
            ->groupBy('events_schedule.date_events')
            ->pluck('date')
            ->toArray();
    }


    public static function listScheduleByDate($id, $date, $events_id = null)
    {
        return self::listByDate($id, $date, $events_id, 'conference');
    }

    public static function listWorkshopByDate($id, $date, $events_id = null)
    {
        return self::listByDate($id, $date, $events_id, 'workshop');
    }

    public static function listMinistageByDate($id, $date, $events_id = null)
    {
        return self::listByDate($id, $date, $events_id, 'showcase');
    }

    private static function listByDate($id, $date, $events_id, $type)
    {
        return DB::table('events_schedule')
            ->select(
                'events_schedule.id',
                'events_schedule.name',
                'events_schedule.time_start',
                'events_schedule.time_end',
                'events_schedule.timezone',
                'events_schedule.location',
                'md_sponsor.image as sponsor_image',
                'events_schedule.desc'
            )
            ->leftJoin('md_sponsor', 'md_sponsor.id', '=', 'events_schedule.md_sponsor_id')
            ->where('events_schedule.status', $type)
            ->when($id, function ($query) use ($id) {
                $query->where('events_schedule.events_id', $id);
            })
            ->when($date, function ($query) use ($date) {
                $query->whereDate('events_schedule.date_events', $date);
            })
            ->when($events_id, function ($query) use ($events_id) {
                $query->where('events_schedule.events_id', $events_id);
            })
            ->orderBy('events_schedule.time_start', 'asc')
            ->groupBy('events_schedule.id')
            ->get();
    }
}
