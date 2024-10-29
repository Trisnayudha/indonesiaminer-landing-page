<?php

namespace App\Repositories;

use App\Models\MdChargingModel;
use App\Models\MdMedicalModel;
use Illuminate\Support\Facades\DB;

class MdMedical extends MdMedicalModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_medical')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_medical')
            ->select(
                'md_medical.id',
                'md_medical.image',
                'md_medical.link'
            )
            ->orderBy('md_medical.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_medical')
            ->select(
                'md_medical.id',
                'md_medical.name',
                'md_medical.image'
            )
            ->orderby('md_medical.id', 'asc')
            ->get();
    }
    public static function listSponsorSchedule($id, $type)
    {
        return DB::table('events_sponsors_temporary')
            ->select(
                'events_sponsors_temporary.id',
                'events_sponsors_temporary.md_sponsor_id as sponsor_id',
                'events_sponsors_temporary.type as type',
                'md_medical.name as name',
                'md_medical.image as image'
            )
            ->leftjoin('md_medical', function ($join) {
                $join->on('events_sponsors_temporary.md_sponsor_id', '=', 'md_medical.id');
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
                $q->orWhereNotNull('md_medical.id');
            })
            ->orderby('events_sponsors_temporary.id', 'asc')
            ->get();
    }
}
