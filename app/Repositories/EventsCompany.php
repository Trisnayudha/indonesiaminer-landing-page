<?php

namespace App\Repositories;

use App\Models\EventsCompanyModel;
use Illuminate\Support\Facades\DB;

class EventsCompany extends EventsCompanyModel
{
    public static function paginateWithFilter($events_id, $search, $country, $category, $special_tags, $filter = null)
    {
        $column_filter = "events_company.sort";
        $type_filter = "asc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "company.name";
            $type_filter = "asc";
        } else if ($filter == "sort-name-descend") {
            $column_filter = "company.name";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "company.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "company.created_at";
            $type_filter = "desc";
        }

        $return = DB::table('events_company')
            ->select(
                'company.id',
                'company.name as title',
                'company.slug',
                'company.image as image',
                'company.email',
                'company.phone',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company.location',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.title as video_title',
                'events_company.type as sponsor_type'
            )
            ->leftJoin('company', function ($join) {
                $join->on('events_company.company_id', '=', 'company.id');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
            })
            ->where(function ($q) use ($events_id, $search, $country, $category, $special_tags) {
                if (!empty($events_id)) {
                    $q->where('events_company.events_id', $events_id);
                }
                if (!empty($search)) {
                    $q->where('company.name', 'LIKE', '%' . $search . '%');
                }
                if (!empty($country)) {
                    $q->where('company.ms_country_id', $country);
                }
                if (!empty($category)) {
                    $q->whereIn('company.ms_company_category_id', $category);
                }
                if (!empty($special_tags)) {
                    $q->whereIn('company_tags_list.company_tags_id', $special_tags);
                }
                $q->where('events_company.status', 'Active');
            })
            ->orderby($column_filter, $type_filter)
            ->get();
        foreach ($return as $r) {
            $r->desc = str_replace("&nbsp;", ' ', $r->desc);
        }

        return $return;
    }

    public static function paginateWithFilterNew($search, $filter, $company = null)
    {
        $column_filter = "events_company.id";
        $type_filter = "desc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "events.name";
            $type_filter = "asc";
        } else if ($filter == "sort-name-descend") {
            $column_filter = "events.name";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "events.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "events.created_at";
            $type_filter = "desc";
        }

        return DB::table('events_company')
            ->join('events', 'events.id', '=', 'events_company.events_id')
            ->join('events_type', 'events_type.id', '=', 'events.events_type_id')
            ->join('events_list', 'events_list.id', '=', 'events.events_list_id')
            ->select(
                'events_company.id as id',
                'events_company.status as status',
                'events_company.type',
                'events.name',
                'events.image',
                'events.desc_short',
                'events.date_start',
                'events.date_end',
                'events_type.name as events_type',
                'events_list.name as events_list',
                'events.location',
                'events.slug'
            )
            ->where(function ($q) use ($search, $company) {
                if ($search) {
                    $q->where('events.name', 'LIKE', '%' . $search . '%');
                }
                if ($company) {
                    $q->where('events_company.company_id', $company);
                }
            })
            ->orderby($column_filter, $type_filter)
            ->paginate(5);
    }

    public static function counterCategoryCompany($id, $events_id)
    {
        return DB::table('events_company')
            ->leftJoin('company', function ($join) {
                $join->on('events_company.company_id', '=', 'company.id');
            })
            ->where(function ($q) use ($id, $events_id) {
                if ($id) {
                    $q->where('company.ms_company_category_id', $id);
                }
                if (!empty($events_id)) {
                    $q->where('events_company.events_id', $events_id);
                }
            })
            ->count();
    }

    public static function paginateWithFilterMining($events_id, $search, $category, $special_tags, $filter = null)
    {
        $column_filter = "company.id";
        $type_filter = "desc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "company.name";
            $type_filter = "asc";
        } else if ($filter == "sort-name-descend") {
            $column_filter = "company.name";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "events_company.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "events_company.created_at";
            $type_filter = "desc";
        }

        return DB::table('events_company')
            ->select(
                'company.id',
                'company.name as title',
                'company.slug',
                'company.image as image',
                'company.email',
                'company.phone',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company.location',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.title as video_title',
                'events_company.type as sponsor_type'
            )
            ->join('company', function ($join) {
                $join->on('events_company.company_id', '=', 'company.id');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
            })
            ->where(function ($q) use ($events_id, $search, $category, $special_tags) {
                if (!empty($events_id)) {
                    $q->where('events_company.events_id', $events_id);
                }
                if (!empty($search)) {
                    $q->where('company.name', 'LIKE', '%' . $search . '%');
                }
                if (!empty($category)) {
                    $q->whereIn('company.ms_company_category_id', $category);
                }
                if (!empty($special_tags)) {
                    $q->whereIn('company_tags_list.company_tags_id', $special_tags);
                }
                $q->where('events_company.status', 'Active');
            })
            ->orderby($column_filter, $type_filter)
            ->paginate(10);
    }

    public static function firstById($id)
    {
        $find = DB::table('events_company')
            ->where('id', $id)
            ->first();

        return new static($find);
    }

    public static function findByIdNew($id)
    {
        $find = DB::table('events_company')
            ->join('events', 'events.id', '=', 'events_company.events_id')
            ->where('events_company.id', $id)
            ->select('events_company.*', 'events.*', 'events_company.id as id')
            ->first();

        return new static($find);
    }

    public static function findAllByExhibitor($events_id)
    {
        $column_filter = "events_company.sort";
        $type_filter = "asc";

        $return = DB::table('events_company')
            ->select(
                'company.id',
                'company.name as name',
                'company.slug',
                'company.image as image',
                'company.email',
                'company.phone',
                'company.company_web',
                'company.website',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company.location',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.title as video_title',
                'events_company.type as sponsor_type'
            )
            ->leftJoin('company', function ($join) {
                $join->on('events_company.company_id', '=', 'company.id');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
            })
            ->where(function ($q) use ($events_id) {
                if (!empty($events_id)) {
                    $q->where('events_company.events_id', $events_id);
                }
                $q->where('events_company.status', 'Active');
            })
            ->where('events_company.exhibition_status', 'On')
            ->orderby($column_filter, $type_filter)
            ->get();
        foreach ($return as $r) {
            $r->desc = str_replace("&nbsp;", ' ', $r->desc);
        }

        return $return;
    }
}
