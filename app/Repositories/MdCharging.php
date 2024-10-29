<?php

namespace App\Repositories;

use App\Models\MdChargingModel;
use Illuminate\Support\Facades\DB;

class MdCharging extends MdChargingModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_charging')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_charging')
            ->select(
                'md_charging.id',
                'md_charging.image',
                'md_charging.link'
            )
            ->orderBy('md_charging.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_charging')
            ->select(
                'md_charging.id',
                'md_charging.name',
                'md_charging.image'
            )
            ->orderby('md_charging.id', 'asc')
            ->get();
    }
    public static function listSponsorSchedule($id, $type)
    {
        return DB::table('events_sponsors_temporary')
            ->select(
                'events_sponsors_temporary.id',
                'events_sponsors_temporary.md_sponsor_id as sponsor_id',
                'events_sponsors_temporary.type as type',
                'md_charging.name as name',
                'md_charging.image as image'
            )
            ->leftjoin('md_charging', function ($join) {
                $join->on('events_sponsors_temporary.md_sponsor_id', '=', 'md_charging.id');
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
                $q->orWhereNotNull('md_charging.id');
            })
            ->orderby('events_sponsors_temporary.id', 'asc')
            ->get();
    }
}
