<?php

namespace App\Repositories;

use App\Models\Events as EventsModel;
use Illuminate\Support\Facades\DB;

class Events extends EventsModel
{
    public static function detailForm($id)
    {
        return new static(DB::table('events')
            ->select(
                'events.id',
                'events.name',
                'events.slug',
                'events.image',
                'events.location',
                'events.date_start',
                'events.date_end',
                'events.conference_link',
                'events.desc',
                'events.desc_short',
                'events.video',
                'events.file_conference',
                'events_type.name as events_type_name',
                'events.events_type_id',
                'events_list.name as events_list_name',
                'events.events_list_id',
                'events.gold_price_rupiah',
                'events.gold_price_rupiah_company',
                'events.gold_price_dollar',
                'events.gold_price_dollar_company',
                'events.platinum_price_rupiah',
                'events.platinum_price_rupiah_company',
                'events.platinum_price_dollar',
                'events.platinum_price_dollar_company',
                'events.active_pack_silver',
                'events.active_pack_gold',
                'events.active_pack_platinum',
                'events.silver_quota_users',
                'events.gold_quota_users',
                'events.platinum_quota_users',
                'events.silver_quota_company',
                'events.gold_quota_company',
                'events.platinum_quota_company',
                'ms_country.name as country_name',
                'events.ms_country_id'
            )
            ->leftJoin('events_type', function ($join) {
                $join->on('events_type.id', '=', 'events.events_type_id');
            })
            ->leftJoin('events_list', function ($join) {
                $join->on('events_list.id', '=', 'events.events_list_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'events.ms_country_id');
            })
            ->where(function ($q) use ($id) {
                if (!empty($id)) {
                    $q->where('events.id', $id);
                }
            })
            ->first());
    }

    public static function listEvents()
    {
        return DB::table('events')
            ->select(
                'events.id',
                'events.name'
            )
            ->orderby('events.id', 'desc')
            ->get();
    }

    public static function paginateWithFilter($search, $events_list, $events_type, $events_tags, $filter = null, $country = null, $users_id = null)
    {
        $column_filter = "events.id";
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

        return DB::table('events')
            ->select(
                'events.id',
                'events.name',
                'events.slug',
                'events.image',
                'events.location',
                'events.date_start',
                'events.date_end',
                'events_type.name as events_type',
                'events_list.name as events_list',
                'users_delegate.payment_status'
            )
            ->leftJoin('events_type', function ($join) {
                $join->on('events_type.id', '=', 'events.events_type_id');
            })
            ->leftJoin('events_list', function ($join) {
                $join->on('events_list.id', '=', 'events.events_list_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'events.ms_country_id');
            })
            ->leftJoin('events_tags_list', function ($join) {
                $join->on('events_tags_list.events_id', '=', 'events.id');
                $join->whereNotNull('events_tags_list.events_tags_id');
            })
            ->leftJoin('users_delegate', function ($join) use ($users_id) {
                $join->on('users_delegate.events_id', '=', 'events.id');
                if ($users_id) {
                    $join->where('users_delegate.users_id', $users_id);
                }
                $join->whereIn('users_delegate.payment_status', ['Paid Off', 'Free']);
                $join->whereNotNull('users_delegate.payment_status');
            })
            ->where(function ($q) use ($search, $events_list, $events_type, $events_tags, $country) {
                if (!empty($search)) {
                    $q->where('events.name', 'LIKE', '%' . $search . '%');
                }
                if (!empty($events_list)) {
                    $q->orWhereIn('events.events_list_id', $events_list);
                }
                if (!empty($events_type)) {
                    $q->orWhereIn('events.events_type_id', $events_type);
                }
                if (!empty($events_tags)) {
                    $q->orWhereIn('events_tags_list.events_tags_id', $events_tags);
                }
                if (!empty($country)) {
                    $q->where('events.ms_country_id', $country);
                }
                //                $q->whereDate('events.date_end', ">=", date('Y-m-d'));
            })
            ->orderby($column_filter, $type_filter)
            ->groupBy('events.id')
            ->paginate(10);
    }

    public static function paginateWithFilterCompany($search, $events_list, $events_type, $events_tags, $filter = null, $country = null, $users_id = null)
    {
        $column_filter = "events.date_start";
        $type_filter = "asc";

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

        return DB::table('events')
            ->select(
                'events.id',
                'events.name',
                'events.slug',
                'events.image',
                'events.location',
                'events.date_start',
                'events.date_end',
                'events_type.name as events_type',
                'events_list.name as events_list',
                'users_company.payment_status'
            )
            ->leftJoin('events_type', function ($join) {
                $join->on('events_type.id', '=', 'events.events_type_id');
            })
            ->leftJoin('events_list', function ($join) {
                $join->on('events_list.id', '=', 'events.events_list_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'events.ms_country_id');
            })
            ->leftJoin('events_tags_list', function ($join) {
                $join->on('events_tags_list.events_id', '=', 'events.id');
                $join->whereNotNull('events_tags_list.events_tags_id');
            })
            ->leftJoin('users_company', function ($join) use ($users_id) {
                $join->on('users_company.events_id', '=', 'events.id');
                if ($users_id) {
                    $join->where('users_company.company_id', $users_id);
                }
                $join->whereIn('users_company.payment_status', ['Paid Off', 'Free']);
                $join->whereNotNull('users_company.payment_status');
            })
            ->where(function ($q) use ($search, $events_list, $events_type, $events_tags, $country) {
                if (!empty($search)) {
                    $q->where('events.name', 'LIKE', '%' . $search . '%');
                }
                if (!empty($events_list)) {
                    $q->orWhereIn('events.events_list_id', $events_list);
                }
                if (!empty($events_type)) {
                    $q->orWhereIn('events.events_type_id', $events_type);
                }
                if (!empty($events_tags)) {
                    $q->orWhereIn('events_tags_list.events_tags_id', $events_tags);
                }
                if (!empty($country)) {
                    $q->where('events.ms_country_id', $country);
                }
                //                $q->whereDate('events.date_end', ">=", date('Y-m-d'));
            })
            ->orderby($column_filter, $type_filter)
            ->groupBy('events.id')
            ->paginate(10);
    }

    public static function listRelateEvents($id, $type_id)
    {
        return DB::table('events')
            ->select(
                'events.id',
                'events.name',
                'events.slug',
                'events.image',
                'events.location',
                'events.date_start',
                'events.date_end',
                'events_type.name as events_type',
                'events_list.name as events_list'
            )
            ->leftJoin('events_type', function ($join) {
                $join->on('events_type.id', '=', 'events.events_type_id');
            })
            ->leftJoin('events_list', function ($join) {
                $join->on('events_list.id', '=', 'events.events_list_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'events.ms_country_id');
            })
            ->leftJoin('events_tags_list', function ($join) {
                $join->on('events_tags_list.events_id', '=', 'events.id');
                $join->whereNotNull('events_tags_list.events_tags_id');
            })
            ->where(function ($q) use ($id, $type_id) {
                if (!empty($id)) {
                    $q->where('events.id', "<>", $id);
                }
                if (!empty($type_id)) {
                    $q->where('events.id', $type_id);
                }
                //                $q->whereDate('events.date_end', ">=", date('Y-m-d'));
            })
            ->orderby('events.date_start', 'asc')
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public static function findPriceById($id)
    {
        return DB::table('events')
            ->select(
                'events.gold_price_rupiah',
                'events.gold_price_rupiah_company',
                'events.gold_price_dollar',
                'events.gold_price_dollar_company',
                'events.platinum_price_rupiah',
                'events.platinum_price_rupiah_company',
                'events.platinum_price_dollar',
                'events.platinum_price_dollar_company'
            )
            ->where(function ($q) use ($id) {
                if (!empty($id)) {
                    $q->where('events.id', $id);
                }
            })
            ->first();
    }

    public static function listUpcomingEvents($id = null)
    {
        return DB::table('events')
            ->select(
                'events.id',
                'events.name',
                'events.slug',
                'events.image',
                'events.location',
                'events.date_start',
                'events.date_end',
                'events_type.name as events_type',
                'events_list.name as events_list'
            )
            ->leftJoin('events_type', function ($join) {
                $join->on('events_type.id', '=', 'events.events_type_id');
            })
            ->leftJoin('events_list', function ($join) {
                $join->on('events_list.id', '=', 'events.events_list_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'events.ms_country_id');
            })
            ->leftJoin('events_tags_list', function ($join) {
                $join->on('events_tags_list.events_id', '=', 'events.id');
                $join->whereNotNull('events_tags_list.events_tags_id');
            })
            ->where(function ($q) use ($id) {
                if (!empty($id)) {
                    $q->where('events.id', "<>", $id);
                }
                $q->where('events.date_end', ">=", date('Y-m-d'));
                $q->whereYear('events.date_end', ">=", date('Y'));
            })
            ->orderby('events.date_start', 'asc')
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public static function paginateWithFilterInTransation($users_id, $search, $events_list, $events_type, $events_tags, $filter = null, $country = null, $condition)
    {
        $column_filter = "events.date_start";
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

        return DB::table('events')
            ->select(
                'events.id',
                'events.name',
                'events.slug',
                'events.image',
                'events.location',
                'events.date_start',
                'events.date_end',
                'events_type.name as events_type',
                'events_list.name as events_list',
                'users_delegate.payment_status',
                'events.status_event'
            )
            ->join('users_delegate', function ($join) use ($users_id) {
                $join->on('users_delegate.events_id', '=', 'events.id');
                $join->where('users_delegate.users_id', $users_id);
                $join->whereIn('users_delegate.payment_status', ['Paid Off', 'Free']);
            })
            ->leftJoin('events_type', function ($join) {
                $join->on('events_type.id', '=', 'events.events_type_id');
            })
            ->leftJoin('events_list', function ($join) {
                $join->on('events_list.id', '=', 'events.events_list_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'events.ms_country_id');
            })
            ->leftJoin('events_tags_list', function ($join) {
                $join->on('events_tags_list.events_id', '=', 'events.id');
                $join->whereNotNull('events_tags_list.events_tags_id');
            })
            ->where(function ($q) use ($search, $events_list, $events_type, $events_tags, $country, $condition) {
                if (!empty($search)) {
                    $q->where('events.name', 'LIKE', '%' . $search . '%');
                }
                if (!empty($events_list)) {
                    $q->orWhereIn('events.events_list_id', $events_list);
                }
                if (!empty($events_type)) {
                    $q->orWhereIn('events.events_type_id', $events_type);
                }
                if (!empty($events_tags)) {
                    $q->orWhereIn('events_tags_list.events_tags_id', $events_tags);
                }
                if (!empty($country)) {
                    $q->where('events.ms_country_id', $country);
                }
                if ($condition) {
                    $q->whereDate('events.date_end', "<=", date('Y-m-d'));
                } else {
                    $q->whereDate('events.date_end', ">=", date('Y-m-d'));
                }
            })
            ->orderby($column_filter, $type_filter)
            ->groupBy('users_delegate.events_id')
            ->paginate(10);
    }

    public static function setUpdateCurs($value)
    {
        return DB::table('events')
            ->update([
                "isUpdateCurs" => $value
            ]);
    }
}
