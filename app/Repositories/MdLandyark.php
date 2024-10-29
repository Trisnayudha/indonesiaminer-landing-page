<?php

namespace App\Repositories;

use App\Models\MdLandyarkModel;
use Illuminate\Support\Facades\DB;

class MdLandyark extends MdLandyarkModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_landyark')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_landyark')
            ->select(
                'md_landyark.id',
                'md_landyark.image',
                'md_landyark.link'
            )
            ->orderBy('md_landyark.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_landyark')
            ->select(
                'md_landyark.id',
                'md_landyark.name',
                'md_landyark.image'
            )
            ->orderby('md_landyark.id', 'asc')
            ->get();
    }
    public static function listSponsorSchedule($id, $type)
    {
        return DB::table('events_sponsors_temporary')
            ->select(
                'events_sponsors_temporary.id',
                'events_sponsors_temporary.md_sponsor_id as sponsor_id',
                'events_sponsors_temporary.type as type',
                'md_landyark.name as name',
                'md_landyark.image as image'
            )
            ->leftjoin('md_landyark', function ($join) {
                $join->on('events_sponsors_temporary.md_sponsor_id', '=', 'md_landyark.id');
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
                $q->orWhereNotNull('md_landyark.id');
            })
            ->orderby('events_sponsors_temporary.id', 'asc')
            ->get();
    }
}
