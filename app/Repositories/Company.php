<?php

namespace App\Repositories;

use App\Models\Company as CompanyModel;
use App\Repositories\Payment;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Company extends CompanyModel
{
    public static function listAll()
    {
        return DB::table('company')
            ->select('company.id', 'company.name')
            ->orderby('company.id', 'asc')
            ->get();
    }

    public static function detailForm($id)
    {
        return new static(DB::table('company')
            ->select(
                'company.id',
                'company.created_at',
                'company.type',

                'company.ms_prefix_call_id',
                'ms_prefix_call.name as call_name',

                'company.ms_company_type_id',
                'ms_company_type.name as company_type',

                'company.ms_phone_code_id',
                'ms_phone_code.code as phone_code',

                'company.ms_country_id',
                'ms_country.name as country_name',

                'company.ms_state_id',
                'ms_state.name as state_name',

                'company.ms_city_id',
                'ms_city.name as city_name',

                'company.ms_company_category_id',
                'ms_company_category.name as company_category_name',
                'company.ms_company_category_other as company_category_other',

                'company.name_pic',
                'company.name',
                'company.slug',
                'company.image',
                'company.image_cropping',
                'company.job_title',
                'company.email',
                'company.email_alternate',
                'company.website',
                'company.phone',
                'company.location',
                'company.branch_office',
                'company.info_one',
                'company.info_two',
                'company.info_three',
                'company.time_close',
                'company.time_open',
                'company.desc',
                'company.post_code',
                'company.company_address',
                'company.with_information',
                'company.facebook',
                'company.twitter',
                'company.linkedin',
                'company.whatsapp',
                'company.instagram',
                'company.company_name',
                // 'company.website as company_web',
                'company.country',
                'company.state',
                'company.city',
                'company.company_web as company_web',
                'company.company_phone',
                'company.ms_company_class_id',
                'company.nonresidence',
                'company.answerresidence',
                'company.pic_name',
                'company.pic_job_title',
                'company.pic_phone',
                'company.pic_email',
                'company.fascia_name',
                'company.pic_signature',
                'company.exhibition_design',
                'company.npwp',
                'company.booth',
                'company.inclusion',
                'company.deadline',
                'company.level',
                'company.size_promotional',


                'company.ms_class_company_minerals_id',
                'ms_class_company_minerals.name as classify_minerals_name',
                'company.class_company_minerals_other as classify_minerals_other',

                'company.ms_class_company_mining_id',
                'ms_class_company_mining.name as classify_mining_name',
                'company.class_company_mining_other as classify_mining_other',

                'company.ms_commod_company_minerals_id',
                'ms_commod_company_minerals.name as commodities_minerals_name',
                'company.commod_company_minerals_other as commodities_minerals_other',

                'company.ms_commod_company_minerals_coal_id',
                'ms_commod_company_minerals_coal.name as commodities_minerals_coal_name',
                'company.commod_company_minerals_coal_other as commodities_minerals_coal_other',

                'company.ms_commod_company_mining_id',
                'ms_commod_company_mining.name as commodities_mining_name',
                'company.commod_company_mining_other as commodities_mining_other',

                'company.ms_origin_manufactur_company_id',
                'ms_origin_manufactur_company.name as origin_manufacturer_name',
                'company.origin_manufactur_company_other as origin_manufacturer_other',

                'company.ms_company_project_type_id',
                'ms_company_project_type.name as project_type'
            )
            ->leftJoin('ms_prefix_call', function ($join) {
                $join->on('ms_prefix_call.id', '=', 'company.ms_prefix_call_id');
            })
            ->leftJoin('ms_company_type', function ($join) {
                $join->on('ms_company_type.id', '=', 'company.ms_company_type_id');
            })
            ->leftJoin('ms_phone_code', function ($join) {
                $join->on('ms_phone_code.id', '=', 'company.ms_phone_code_id');
            })
            ->leftJoin('ms_country', function ($join) {
                $join->on('ms_country.id', '=', 'company.ms_country_id');
            })
            ->leftJoin('ms_state', function ($join) {
                $join->on('ms_state.id', '=', 'company.ms_state_id');
            })
            ->leftJoin('ms_city', function ($join) {
                $join->on('ms_city.id', '=', 'company.ms_city_id');
            })
            ->leftJoin('ms_company_category', function ($join) {
                $join->on('ms_company_category.id', '=', 'company.ms_company_category_id');
            })
            ->leftJoin('ms_class_company_minerals', function ($join) {
                $join->on('ms_class_company_minerals.id', '=', 'company.ms_class_company_minerals_id');
            })
            ->leftJoin('ms_class_company_mining', function ($join) {
                $join->on('ms_class_company_mining.id', '=', 'company.ms_class_company_mining_id');
            })
            ->leftJoin('ms_commod_company_minerals', function ($join) {
                $join->on('ms_commod_company_minerals.id', '=', 'company.ms_commod_company_minerals_id');
            })
            ->leftJoin('ms_commod_company_minerals_coal', function ($join) {
                $join->on('ms_commod_company_minerals_coal.id', '=', 'company.ms_commod_company_minerals_coal_id');
            })
            ->leftJoin('ms_commod_company_mining', function ($join) {
                $join->on('ms_commod_company_mining.id', '=', 'company.ms_commod_company_mining_id');
            })
            ->leftJoin('ms_origin_manufactur_company', function ($join) {
                $join->on('ms_origin_manufactur_company.id', '=', 'company.ms_origin_manufactur_company_id');
            })
            ->leftJoin('ms_company_project_type', function ($join) {
                $join->on('ms_company_project_type.id', '=', 'company.ms_company_project_type_id');
            })
            ->where(function ($q) use ($id) {
                if (!empty($id)) {
                    $q->where('company.id', $id);
                }
            })
            ->first());
    }

    public static function paginateWithFilter($search, $country, $category, $special_tags, $filter = null)
    {
        // $column_filter = "company.id";
        // $column_filter = "company.sort_number";
        // $column_filter = "company.type";
        // $type_filter = "asc";

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

        $query = DB::table('company')
            ->select(
                'company.id',
                'company.type',
                'company.name as title',
                'company.slug',
                'company.image',
                'company.email',
                'company.phone',
                'company.location',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.title as video_title',
                'company_sort_priority.sort as sort'
            )
            ->leftJoin('company_tags_list', function ($join) {
                $join->on('company_tags_list.company_id', '=', 'company.id');
                $join->whereNotNull('company_tags_list.company_tags_id');
            })
            ->leftJoin('company_sort_priority', function ($join) {
                $join->on('company_sort_priority.company_type', '=', 'company.type');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
                $join->whereNotNull('company_video.company_id');
            })
            ->where(function ($q) use ($search, $country, $category, $special_tags) {
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
                $q->where('company.in_directory', 'Yes');
            })
            ->groupBy('company.id');
        if ($column_filter) {
            $query->orderby($column_filter, $type_filter);
        } else {
            $query->orderby('sort', 'asc')->orderby('company.created_at', 'desc');
        }
        $query = $query->get();

        return $query;
    }

    public static function checkIsRegisteredCompany($email)
    {
        return new static(DB::table('company')
            ->where(function ($q) use ($email) {
                if ($email) {
                    $q->where('company.email', 'LIKE', '%' . $email . '%');
                }
            })
            ->first());
    }

    public static function checkRegisteredCompany($email)
    {
        if ($email) {
            return DB::table('company')
                ->where(function ($q) use ($email) {
                    if ($email) {
                        $q->where('company.email', $email);
                    }
                })
                ->first();
        }
    }

    public static function getLocation($id)
    {
        return DB::table('company')
            ->where('id', $id)
            ->first()
            ->location;
    }

    public static function checkIsRegisteredUsers($email)
    {
        return new static(DB::table('company')
            ->where(function ($q) use ($email) {
                if ($email) {
                    $q->where('company.email', $email);
                }
            })
            ->first());
    }

    public static function getLimitByType($search, $country, $category, $special_tags, $index = null, $type)
    {

        $query = DB::table('company')
            ->select(
                'company.id',
                'company.type',
                'company.name as title',
                'company.slug',
                'company.image',
                'company.email',
                'company.phone',
                'company.location',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.id as video_id',
                'company_video.title as video_title',
                'company_sort_priority.sort as sort'
            )
            ->leftJoin('company_tags_list', function ($join) {
                $join->on('company_tags_list.company_id', '=', 'company.id');
                $join->whereNotNull('company_tags_list.company_tags_id');
            })
            ->leftJoin('company_sort_priority', function ($join) {
                $join->on('company_sort_priority.company_type', '=', 'company.type');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
                $join->whereNotNull('company_video.company_id');
            })
            ->where(function ($q) use ($search, $country, $category, $special_tags, $index) {
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
                if (!empty($index)) {
                    $q->where('company.name', 'LIKE', $index . '%');
                }
                $q->where('company.in_directory', 'Yes');
            })
            ->where('type', $type)
            ->groupBy('company.id');
        // if($column_filter) {
        //     $query->orderby($column_filter, $type_filter);
        // }else {
        // }
        $query->orderby('sort', 'asc')->orderby('company.created_at', 'desc');
        $query = $query->paginate(10);

        return $query;
    }

    public static function getLimitByType2024($search, $country, $category, $special_tags, $index = null, $type)
    {
        $query = DB::table('events_company')
            ->select(
                'company.id',
                'company.type',
                'company.name as title',
                'company.slug',
                'company.image',
                'company.email',
                'company.phone',
                'company.location',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.id as video_id',
                'company_video.title as video_title',
                'company_sort_priority.sort as sort',
                'events_company.events_id'
            )
            ->leftJoin('company', function ($join) {
                $join->on('company.id', '=', 'events_company.company_id');
            })
            ->leftJoin('company_tags_list', function ($join) {
                $join->on('company_tags_list.company_id', '=', 'company.id');
                $join->whereNotNull('company_tags_list.company_tags_id');
            })
            ->leftJoin('company_sort_priority', function ($join) {
                $join->on('company_sort_priority.company_type', '=', 'company.type');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
                $join->whereNotNull('company_video.company_id');
            })
            ->where(function ($q) use ($search, $country, $category, $special_tags, $index) {
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
                if (!empty($index)) {
                    $q->where('company.name', 'LIKE', $index . '%');
                }
                $q->where('company.in_directory', 'Yes');
            })
            ->where('events_company.type', $type)
            ->where('events_company.events_id', '=', '12')
            ->groupBy('company.id');
        // if($column_filter) {
        //     $query->orderby($column_filter, $type_filter);
        // }else {
        // }
        $query->orderby('sort', 'asc')->orderby('company.created_at', 'desc');
        $query = $query->paginate(10);

        return $query;
    }

    public static function getRandom($is_directory = 'Yes', $type)
    {
        $query = DB::table('company')
            ->select(
                'company.id',
                'company.type',
                'company.name as title',
                'company.slug',
                'company.image',
                'company.email',
                'company.phone',
                'company.location',
                'company.desc',
                'company.info_one as company_info_one',
                'company.info_two as company_info_second',
                'company.info_three as company_info_third',
                'company_video.url as video_url',
                'company_video.thumbnail as video_thumbnail',
                'company_video.id as video_id',
                'company_video.title as video_title',
                'company_sort_priority.sort as sort'
            )
            ->leftJoin('company_tags_list', function ($join) {
                $join->on('company_tags_list.company_id', '=', 'company.id');
                $join->whereNotNull('company_tags_list.company_tags_id');
            })
            ->leftJoin('company_sort_priority', function ($join) {
                $join->on('company_sort_priority.company_type', '=', 'company.type');
            })
            ->leftJoin('company_video', function ($join) {
                $join->on('company_video.company_id', '=', 'company.id');
                $join->where('company_video.is_main', 1);
                $join->whereNotNull('company_video.company_id');
            })
            ->where(function ($q) use ($is_directory) {
                if ($is_directory == 'Yes') {
                    $q->where('company.in_directory', 'Yes');
                }
            })
            ->where('type', $type)
            ->inRandomOrder();
        $query = $query->paginate(5);

        return $query;
    }
}
