<?php

namespace App\Repositories;

use App\Models\MdMediaPartnerModel;
use Illuminate\Support\Facades\DB;

class MdMediaPartner extends MdMediaPartnerModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_media_partner')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_media_partner')
            ->select(
                'md_media_partner.id',
                'md_media_partner.image',
                'md_media_partner.link'
            )
            ->where('status', 'show')
            ->orderBy('md_media_partner.sort', 'asc')
            ->get();
    }
    public static function listAllHome2024()
    {
        return DB::table('md_media_partner')
            ->select(
                'md_media_partner.id',
                'md_media_partner.image',
                'md_media_partner.link'
            )
            ->where('status2', 'show')
            ->orderBy('md_media_partner.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_media_partner')
            ->select(
                'md_media_partner.id',
                'md_media_partner.name',
                'md_media_partner.image'
            )
            ->orderby('md_media_partner.id', 'asc')
            ->get();
    }
}
