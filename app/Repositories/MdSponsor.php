<?php

namespace App\Repositories;

use App\Models\MdSponsorModel;
use Illuminate\Support\Facades\DB;

class MdSponsor extends MdSponsorModel
{
    public static function firstById($id, $type)
    {
        $find = DB::table('md_sponsor')
            ->where('id', $id)
            ->where('type', $type)
            ->first();

        return new static($find);
    }

    /**
     * @param $type
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome($type)
    {
        return DB::table('md_sponsor')
            ->select(
                'md_sponsor.id',
                'md_sponsor.image',
                'md_sponsor.link'
            )
            ->where('md_sponsor.type', $type)
            ->where('md_sponsor.status', 'show')
            ->orderby('md_sponsor.sort', 'asc')
            ->get();
    }

    public static function listAllHome2024($type)
    {
        return DB::table('md_sponsor')
            ->select(
                'md_sponsor.id',
                'md_sponsor.image',
                'md_sponsor.name',
                'md_sponsor.desc',
            )
            ->where('md_sponsor.type2', $type)
            ->where('md_sponsor.status2', 'show')
            ->orderby('md_sponsor.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_sponsor')
            ->select(
                'md_sponsor.id',
                'md_sponsor.type',
                'md_sponsor.name',
                'md_sponsor.image'
            )
            ->orderby('md_sponsor.id', 'asc')
            ->get();
    }

    public static function listById($id)
    {
        return DB::table('md_sponsor')
            ->select(
                'md_sponsor.id',
                'md_sponsor.type',
                'md_sponsor.name',
                'md_sponsor.image'
            )
            ->where('md_sponsor.id', $id)
            ->orderby('md_sponsor.id', 'asc')
            ->get();
    }
}
