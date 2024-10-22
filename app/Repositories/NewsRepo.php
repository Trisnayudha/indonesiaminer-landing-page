<?php

namespace App\Repositories;

use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsRepo extends News
{
    public static function detailForm($news_id)
    {
        return new static(DB::table('news')
            ->select(
                'news.id',
                'news.highlight',
                'news.flag',
                'news.news_category_id',
                'news_category.name as category_name',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.reference_name',
                'news.reference_link',
                'news.date_news',
                'news.desc'
            )
            ->leftJoin("news_category", function ($join) {
                $join->on('news_category.id', '=', 'news.news_category_id');
            })
            ->where(function ($q) use ($news_id) {
                $q->orWhereNotNull('news.id');
                $q->where('news.id', $news_id);
            })
            ->first());
    }

    public static function findDetailNewsCompany($news_id)
    {
        return new static(DB::table('news')
            ->select(
                'news.id',
                'news.highlight',
                'news.flag',
                'news.news_category_id',
                'news_category.name as category_name',
                'news.company_id',
                'company.name as company_name',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc'
            )
            ->leftJoin("news_category", function ($join) {
                $join->on('news_category.id', '=', 'news.news_category_id');
            })
            ->leftJoin("company", function ($join) {
                $join->on('company.id', '=', 'news.company_id');
            })
            ->where(function ($q) use ($news_id) {
                $q->orWhereNotNull('news.id');
                $q->where('news.id', $news_id);
            })
            ->first());
    }

    public static function listAllNews($search, $category_news = [], $filter = null)
    {
        $column_filter = "news.id";
        $type_filter = "desc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "news.title";
            $type_filter = "asc";
        } elseif ($filter == "sort-name-descend") {
            $column_filter = "news.title";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "news.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "news.created_at";
            $type_filter = "desc";
        }

        return DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc'
            )
            ->leftJoin('news_category_list', function ($join) use ($category_news) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category_news)) {
                    $join->whereIn('news_category_list.news_category_id', $category_news);
                }
            })
            ->where(function ($q) use ($search, $category_news) {
                if (!empty($search)) {
                    $q->where('news.title', 'LIKE', '%' . $search . '%')
                        ->orWhere('news.location', 'LIKE', '%' . $search . '%')
                        ->orWhere('news.desc', 'LIKE', '%' . $search . '%');
                }
                //                if (!empty($category_news)) {
                //                    $q->whereIn('news.news_category_id', $category_news);
                //                }
                $q->where('news.flag', 'Portal');
                $q->orWhere('news.all_highlight', 'Yes');
            })
            ->where(function ($q) {
                //                $q->whereNotNull('news_category_list.news_id');
            })
            ->groupBy('news.id')
            ->orderby($column_filter, $type_filter)
            ->paginate(10);
    }

    public static function paginateWithFilter($search, $tags, $category, $filter = null, $company = null, $is_directory = 'Yes')
    {
        $column_filter = "news.id";
        $type_filter = "desc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "news.title";
            $type_filter = "asc";
        } else if ($filter == "sort-name-descend") {
            $column_filter = "news.title";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "news.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "news.created_at";
            $type_filter = "desc";
        }

        $query = DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.views',
                'news.desc',
                'news.share',
                'news.last_update',
                'news.created_at',
                'company.name as company_name',
                'news_events.id as news_events_id'
            )
            ->leftJoin("company", function ($join) {
                $join->on('company.id', '=', 'news.company_id');
                $join->whereNotNull('company.id');
            })
            ->leftJoin('news_category_list', function ($join) use ($category) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category)) {
                    $join->whereIn('news_category_list.news_category_id', $category);
                }
            })
            ->leftJoin('news_tag_list', function ($join) {
                $join->on('news_tag_list.news_id', '=', 'news.id');
                $join->whereNotNull('news_tag_list.news_tag_id');
            })
            ->leftJoin('news_events', function ($join) {
                $join->on('news_events.news_id', '=', 'news.id');
            })
            ->where(function ($q) use ($search, $tags, $category, $company, $is_directory) {
                if (!empty($search)) {
                    $q->where('news.title', 'LIKE', '%' . $search . '%')
                        ->orWhere('news.desc', 'LIKE', '%' . $search . '%');
                }
                if (!empty($tags)) {
                    $q->whereIn('news_tag_list.news_tag_id', $tags);
                }
                //                if (!empty($category)) {
                //                    $q->whereIn('news.news_category_id', $category);
                //                }
                if (!empty($company)) {
                    $q->where('news.company_id', $company);
                }
                $q->where('news.flag', 'Company');
                if (!empty($company)) {
                    $q->where('news.highlight', 'Yes');
                }
                if ($is_directory == 'Yes') {
                    $q->where('company.in_directory', 'Yes');
                }
            })
            ->groupBy('news.id')
            ->orderby($column_filter, $type_filter)
            ->orderby('company.type', 'asc')
            // if(!$filter) {
            //     $query->inRandomOrder();
            // }
            // $query = $query
            ->paginate(10);
        return $query;
    }

    public static function listRelateNews($category_id, $news_id, $company_id = null)
    {
        return DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc'
            )
            ->leftJoin('news_category_list', function ($join) use ($category_id) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category_id)) {
                    $join->where('news_category_list.news_category_id', $category_id);
                }
            })
            ->where(function ($q) use ($category_id, $news_id, $company_id) {
                //                if (!empty($category_id)) {
                //                    $q->where('news.news_category_id', $category_id);
                //                }
                if (!empty($news_id)) {
                    $q->where('news.id', '!=', $news_id);
                }
                if (!empty($company_id)) {
                    $q->where('news.company_id', $company_id);
                    $q->where('news.flag', 'Company');
                    $q->where('news.highlight', 'Yes');
                } else {
                    $q->where('news.flag', 'Portal');
                }
            })
            ->where(function ($q) {
                //                $q->whereNotNull('news_category_list.news_id');
            })
            ->inRandomOrder()
            ->groupBy('news.id')
            ->orderby('news.id', 'desc')
            ->limit(5)
            ->get();
    }

    public static function listRelateCompanyNews($category_id, $news_id, $company_id = null)
    {
        return DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc'
            )
            ->leftJoin('news_category_list', function ($join) use ($category_id) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category_id)) {
                    $join->where('news_category_list.news_category_id', $category_id);
                }
            })
            ->where(function ($q) use ($category_id, $news_id, $company_id) {
                //                if (!empty($category_id)) {
                //                    $q->where('news.news_category_id', $category_id);
                //                }
                if (!empty($news_id)) {
                    $q->where('news.id', '!=', $news_id);
                }
                if (!empty($company_id)) {
                    $q->where('news.company_id', '=', $company_id);
                }
                $q->where('news.flag', 'Company');
                $q->where('news.highlight', 'Yes');
            })
            ->where(function ($q) {
                //                $q->whereNotNull('news_category_list.news_id');
            })
            ->groupBy('news.id')
            ->orderby('news.id', 'desc')
            ->limit(2)
            ->get();
    }

    public static function paginateWithFilterMining($events_id, $search, $category, $tags, $filter = null, $is_mining_directory = null)
    {
        $column_filter = "news.id";
        $type_filter = "desc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "news.title";
            $type_filter = "asc";
        } else if ($filter == "sort-name-descend") {
            $column_filter = "news.title";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "news.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "news.created_at";
            $type_filter = "desc";
        }

        $arr = EventsCompany::table()
            ->where('events_id', $events_id)
            ->pluck('company_id')
            ->toArray();

        $query = DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc',
                'company.name as company_name'
            )
            // ->whereIn('news.company_id', $arr)
            ->leftJoin("company", function ($join) {
                $join->on('company.id', '=', 'news.company_id');
                $join->whereNotNull('news.company_id');
            })
            ->leftJoin('news_category_list', function ($join) use ($category) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category)) {
                    $join->where('news_category_list.news_category_id', $category);
                }
            })
            ->leftJoin('news_tag_list', function ($join) {
                $join->on('news_tag_list.news_id', '=', 'news.id');
                $join->orWhereNotNull('news_tag_list.news_tag_id');
            })
            ->leftJoin('events_company', function ($join) use ($events_id) {
                $join->on('events_company.company_id', '=', 'news.company_id');
                $join->where('events_company.events_id', $events_id);
                $join->whereNotNull('events_company.company_id');
            })
            ->where(function ($q) use ($search, $category, $tags) {
                if (!empty($search)) {
                    $q->where('news.title', 'LIKE', '%' . $search . '%')
                        ->orWhere('news.desc', 'LIKE', '%' . $search . '%');
                }
                if (!empty($tags)) {
                    $q->whereIn('news_tag_list.news_tag_id', $tags);
                }
                //                if (!empty($category)) {
                //                    $q->whereIn('news.news_category_id', $category);
                //                }
                // $q->where('news.flag', 'Company');
                // $q->where('news.highlight', 'Yes');
            })
            ->where(function ($q) use ($events_id) {
                //                $q->whereNotNull('news_category_list.news_id');
                $q->where('news_events.events_id', '=', $events_id);
            })
            ->groupBy('news.id')
            ->orderby($column_filter, $type_filter);
        if ($is_mining_directory) {
            $query->join('news_events', 'news_events.news_id', '=', 'news.id');
        }
        $query = $query->paginate(10);
        return $query;
    }

    public static function listAllNewsOnlySearch($search, $except = [])
    {
        $column_filter = "news.date_news";
        $type_filter = "desc";

        return DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc',
                'news.views'
            )
            ->where(function ($q) use ($search, $except) {
                if (!empty($search)) {
                    $q->where('news.title', 'LIKE', '%' . $search . '%')
                        ->orWhere('news.desc', 'LIKE', '%' . $search . '%');
                }
                $q->where('news.flag', 'Portal');
            })
            // ->whereNotIn('news.date_news', $except)
            // ->groupBy('news.date_news')
            ->orderby($column_filter, $type_filter)
            ->paginate(10);
    }

    public static function newListRelateNews($category_id, $news_id, $company_id = null)
    {
        return DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.desc',
                'news.views'
            )
            ->leftJoin('news_category_list', function ($join) use ($category_id) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category_id)) {
                    $join->where('news_category_list.news_category_id', $category_id);
                }
            })
            ->where(function ($q) use ($news_id, $company_id) {
                if (!empty($news_id)) {
                    $q->where('news.id', '!=', $news_id);
                }
                if (!empty($company_id)) {
                    $q->where('news.company_id', $company_id)
                        ->where('news.flag', 'Company')
                        ->where('news.highlight', 'Yes');
                } else {
                    $q->where('news.flag', 'Portal');
                }
            })
            ->inRandomOrder()
            ->groupBy('news.id', 'news.title', 'news.slug', 'news.image', 'news.location', 'news.date_news', 'news.desc', 'news.views')
            ->orderBy('news.id', 'desc')
            ->limit(4)
            ->get();
    }


    public static function paginateWithFilterIndex($search, $tags, $category, $index, $company = null, $is_directory = 'Yes')
    {
        $column_filter = "news.id";
        $type_filter = "desc";

        $query = DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.views',
                'news.desc',
                'company.name as company_name',
                'news_events.id as news_events_id'
            )
            ->leftJoin("company", function ($join) {
                $join->on('company.id', '=', 'news.company_id');
                $join->whereNotNull('company.id');
            })
            ->leftJoin('news_category_list', function ($join) use ($category) {
                $join->on('news_category_list.news_id', '=', 'news.id');
            })
            ->leftJoin('news_tag_list', function ($join) {
                $join->on('news_tag_list.news_id', '=', 'news.id');
                $join->whereNotNull('news_tag_list.news_tag_id');
            })
            ->leftJoin('news_events', function ($join) {
                $join->on('news_events.news_id', '=', 'news.id');
            })
            ->where(function ($q) use ($search, $tags, $category, $company, $is_directory, $index) {
                if (!empty($search)) {
                    $q->where('news.title', 'LIKE', '%' . $search . '%');
                }
                if (!empty($tags)) {
                    $q->whereIn('news_tag_list.news_tag_id', $tags);
                }
                //                if (!empty($category)) {
                //                    $q->whereIn('news.news_category_id', $category);
                //                }
                if (!empty($company)) {
                    $q->where('news.company_id', $company);
                }
                $q->where('news.flag', 'Company');
                if (!empty($company)) {
                    $q->where('news.highlight', 'Yes');
                }
                if ($is_directory == 'Yes') {
                    $q->where('company.in_directory', 'Yes');
                }
                if (!empty($index)) {
                    $q->where('news.title', 'LIKE', $index . '%');
                }
                if (!empty($category)) {
                    $q->whereIn('news_category_list.news_category_id', $category);
                }
            })
            ->groupBy('news.id')
            ->orderby($column_filter, $type_filter)
            ->orderby('company.type', 'asc')
            // if(!$filter) {
            //     $query->inRandomOrder();
            // }
            // $query = $query
            ->paginate(10);
        return $query;
    }

    public static function getRandom($is_directory = 'Yes', $type)
    {
        $column_filter = "news.id";
        $type_filter = "desc";

        $query = DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.views',
                'news.desc',
                'company.name as company_name',
                'company.type',
                'news_events.id as news_events_id'
            )
            ->leftJoin("company", function ($join) {
                $join->on('company.id', '=', 'news.company_id');
                $join->whereNotNull('company.id');
            })
            ->leftJoin('news_tag_list', function ($join) {
                $join->on('news_tag_list.news_id', '=', 'news.id');
                $join->whereNotNull('news_tag_list.news_tag_id');
            })
            ->leftJoin('news_events', function ($join) {
                $join->on('news_events.news_id', '=', 'news.id');
            })
            ->where(function ($q) use ($is_directory) {

                if ($is_directory == 'Yes') {
                    $q->where('company.in_directory', 'Yes');
                }
            })
            ->groupBy('news.id')
            ->where('company.type', $type)
            ->inRandomOrder()
            ->paginate(5);
        return $query;
    }

    public static function paginateWithFilterAllStatus($search, $tags, $category, $filter = null, $company = null, $is_directory = 'Yes')
    {
        $column_filter = "news.id";
        $type_filter = "desc";

        if ($filter == "sort-name-ascend") {
            $column_filter = "news.title";
            $type_filter = "asc";
        } else if ($filter == "sort-name-descend") {
            $column_filter = "news.title";
            $type_filter = "desc";
        } elseif ($filter == "sort-date-ascend") {
            $column_filter = "news.created_at";
            $type_filter = "asc";
        } elseif ($filter == "sort-date-descend") {
            $column_filter = "news.created_at";
            $type_filter = "desc";
        }

        $query = DB::table('news')
            ->select(
                'news.id',
                'news.title',
                'news.slug',
                'news.image',
                'news.location',
                'news.date_news',
                'news.views',
                'news.desc',
                'news.share',
                'news.last_update',
                'news.created_at',
                'company.name as company_name',
                'news_events.id as news_events_id',
                'news.highlight'
            )
            ->leftJoin("company", function ($join) {
                $join->on('company.id', '=', 'news.company_id');
                $join->whereNotNull('company.id');
            })
            ->leftJoin('news_category_list', function ($join) use ($category) {
                $join->on('news_category_list.news_id', '=', 'news.id');
                if (!empty($category)) {
                    $join->whereIn('news_category_list.news_category_id', $category);
                }
            })
            ->leftJoin('news_tag_list', function ($join) {
                $join->on('news_tag_list.news_id', '=', 'news.id');
                $join->whereNotNull('news_tag_list.news_tag_id');
            })
            ->leftJoin('news_events', function ($join) {
                $join->on('news_events.news_id', '=', 'news.id');
            })
            ->where(function ($q) use ($search, $tags, $category, $company, $is_directory) {
                if (!empty($search)) {
                    $q->where('news.title', 'LIKE', '%' . $search . '%')
                        ->orWhere('news.desc', 'LIKE', '%' . $search . '%');
                }
                if (!empty($tags)) {
                    $q->whereIn('news_tag_list.news_tag_id', $tags);
                }
                //                if (!empty($category)) {
                //                    $q->whereIn('news.news_category_id', $category);
                //                }
                if (!empty($company)) {
                    $q->where('news.company_id', $company);
                }
                $q->where('news.flag', 'Company');
                // if (!empty($company)) {
                //     $q->where('news.highlight', 'Yes');
                // }
                if ($is_directory == 'Yes') {
                    $q->where('company.in_directory', 'Yes');
                }
            })
            ->groupBy('news.id')
            ->orderby($column_filter, $type_filter)
            ->orderby('company.type', 'asc')
            // if(!$filter) {
            //     $query->inRandomOrder();
            // }
            // $query = $query
            ->paginate(10);
        return $query;
    }
}
