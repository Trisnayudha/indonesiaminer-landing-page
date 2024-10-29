<?php

namespace App\Repositories;

use App\Models\MdKnowledgePartnerModel;
use Illuminate\Support\Facades\DB;

class MdKnowledgePartner extends MdKnowledgePartnerModel
{
    public static function firstById($id)
    {
        $find = DB::table('md_knowledge_partner')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function listAllHome()
    {
        return DB::table('md_knowledge_partner')
            ->select(
                'md_knowledge_partner.id',
                'md_knowledge_partner.image',
                'md_knowledge_partner.link'
            )
            ->where('status', 'show')
            ->orderBy('md_knowledge_partner.sort', 'asc')
            ->get();
    }
    public static function listAllHome2024()
    {
        return DB::table('md_knowledge_partner')
            ->select(
                'md_knowledge_partner.id',
                'md_knowledge_partner.image',
                'md_knowledge_partner.link'
            )
            ->where('status2', 'show')
            ->orderBy('md_knowledge_partner.sort', 'asc')
            ->get();
    }

    public static function listAll()
    {
        return DB::table('md_knowledge_partner')
            ->select(
                'md_knowledge_partner.id',
                'md_knowledge_partner.name',
                'md_knowledge_partner.image'
            )
            ->orderby('md_knowledge_partner.id', 'asc')
            ->get();
    }

    public static function listSponsorSchedule($id, $type)
    {
        return DB::table('events_sponsors_temporary')
            ->select(
                'events_sponsors_temporary.id',
                'events_sponsors_temporary.md_sponsor_id as sponsor_id',
                'events_sponsors_temporary.type as type',
                'md_knowledge_partner.name as name',
                'md_knowledge_partner.image as image'
            )
            ->leftjoin('md_knowledge_partner', function ($join) {
                $join->on('events_sponsors_temporary.md_sponsor_id', '=', 'md_knowledge_partner.id');
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
                $q->orWhereNotNull('md_knowledge_partner.id');
            })
            ->orderby('events_sponsors_temporary.id', 'asc')
            ->get();
    }
}
