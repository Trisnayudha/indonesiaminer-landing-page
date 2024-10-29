<?php

namespace App\Repositories;

use App\Models\MdLunchModel;
use Illuminate\Support\Facades\DB;

class MdLunch extends MdLunchModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_lunch')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_lunch')
            ->select(
                'md_lunch.id',
                'md_lunch.image',
                'md_lunch.link'
            )
            ->orderBy('md_lunch.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_lunch')
            ->select(
                'md_lunch.id',
                'md_lunch.name',
                'md_lunch.image'
            )
            ->orderby('md_lunch.id', 'asc')
            ->get();
    }
    public static function listSponsorSchedule($id, $type)
    {
        return DB::table('events_sponsors_temporary')
            ->select(
                'events_sponsors_temporary.id',
                'events_sponsors_temporary.md_sponsor_id as sponsor_id',
                'events_sponsors_temporary.type as type',
                'md_lunch.name as name',
                'md_lunch.image as image'
            )
            ->leftjoin('md_lunch', function ($join) {
                $join->on('events_sponsors_temporary.md_sponsor_id', '=', 'md_lunch.id');
            })
            ->where(function ($q) use ($id, $type) {
                if (!empty($id)) {
                    $q->where('events_sponsors_temporary.events_id', $id);
                }
                if (!empty($type)) {
                    //                    $q->where('md_sponsor.type', $type);
                    $q->where('events_sponsors_temporary.type', $type);
                }
            })
            ->where(function ($q) {
                $q->orWhereNotNull('md_lunch.id');
            })
            ->orderby('events_sponsors_temporary.id', 'asc')
            ->get();
    }
}
