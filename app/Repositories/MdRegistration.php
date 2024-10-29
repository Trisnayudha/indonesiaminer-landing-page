<?php

namespace App\Repositories;

use App\Models\MdRegistrationModel;
use Illuminate\Support\Facades\DB;

class MdRegistration extends MdRegistrationModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_registration')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_registration')
            ->select(
                'md_registration.id',
                'md_registration.image',
                'md_registration.link'
            )
            ->orderBy('md_registration.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_registration')
            ->select(
                'md_registration.id',
                'md_registration.name',
                'md_registration.image'
            )
            ->orderby('md_registration.id', 'asc')
            ->get();
    }
    public static function listSponsorSchedule($id, $type)
    {
        return DB::table('events_sponsors_temporary')
            ->select(
                'events_sponsors_temporary.id',
                'events_sponsors_temporary.md_sponsor_id as sponsor_id',
                'events_sponsors_temporary.type as type',
                'md_registration.name as name',
                'md_registration.image as image'
            )
            ->leftjoin('md_registration', function ($join) {
                $join->on('events_sponsors_temporary.md_sponsor_id', '=', 'md_registration.id');
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
                $q->orWhereNotNull('md_registration.id');
            })
            ->orderby('events_sponsors_temporary.id', 'asc')
            ->get();
    }
}
