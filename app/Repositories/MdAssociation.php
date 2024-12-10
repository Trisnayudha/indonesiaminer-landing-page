<?php

namespace App\Repositories;

use App\Models\MdAssociationModel;
use Illuminate\Support\Facades\DB;

class MdAssociation extends MdAssociationModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_association')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_association')
            ->select(
                'md_association.id',
                'md_association.image',
                'md_association.link',
                'md_association.name',

            )
            ->where('status', 'show')
            ->orderBy('md_association.sort', 'asc')
            ->get();
    }
    public static function listAllHome2024()
    {
        return DB::table('md_association')
            ->select(
                'md_association.id',
                'md_association.image',
                'md_association.link'
            )
            ->where('status2', 'show')
            ->orderBy('md_association.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_association')
            ->select(
                'md_association.id',
                'md_association.name',
                'md_association.image'
            )
            ->orderby('md_association.id', 'asc')
            ->get();
    }
}
