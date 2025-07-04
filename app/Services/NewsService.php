<?php

namespace App\Services;

use App\Repositories\News;
use App\Repositories\NewsRepo;
use App\Traits\Directory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NewsService extends NewsRepo
{
    use Directory;

    public static function listAllNews($search, $category_news = [], $filter = null)
    {
        $data = NewsRepo::listAllNews($search, $category_news, $filter);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
        }
        return $data;
    }

    public static function listRelateNews($category_id, $news_id, $company_id = null)
    {
        $data = News::listRelateNews($category_id, $news_id, $company_id);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
        }
        return $data;
    }

    public static function paginateWithFilter($search, $tags, $category, $filter = null, $company = null, $is_directory = 'Yes')
    {
        $data = News::paginateWithFilter($search, $tags, $category, $filter, $company, $is_directory);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
            $row->isBookmark = self::isBookmark('News', $row->id);
            $row->isLogin = self::isLogin();
        }
        return $data;
    }

    public static function listRelateCompanyNews($category_id, $news_id, $company_id = null)
    {
        $data = News::listRelateCompanyNews($category_id, $news_id, $company_id);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
        }
        return $data;
    }

    public static function paginateWithFilterMining($events_id, $search, $category, $tags, $filter = null, $is_mining_directory = null)
    {
        $data = parent::paginateWithFilterMining($events_id, $search, $category, $tags, $filter, $is_mining_directory); // TODO: Change the autogenerated stub
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
            $row->isBookmark = self::isBookmark('News', $row->id, $events_id);
            $row->isLogin = self::isLogin();
            $row->events_id = $events_id;
        }
        return $data;
    }

    public static function listAllNewsOnlySearch($search, $except = [])
    {
        $data = NewsRepo::listAllNewsOnlySearch($search, $except);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = !empty($row->date_news)
                ? date('d M Y, h:i A',  strtotime($row->date_news))  // ← h instead of H
                : '';

            // $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc),0,  50).'...' : strip_tags($row->desc));
            $row->desc = (!empty($row->desc) ? strip_tags($row->desc) : '');
            $row->views = $row->views == null ? 0 : $row->views;
        }
        return $data;
    }

    public static function newListRelateNews($category_id, $news_id, $company_id = null)
    {
        $data = NewsRepo::newListRelateNews($category_id, $news_id, $company_id);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
            $row->views = $row->views == null ? 0 : $row->views;
        }
        return $data;
    }

    public static function paginateWithFilterIndex($search, $tags, $category, $index, $company = null, $is_directory = 'Yes')
    {
        $data = News::paginateWithFilterIndex($search, $tags, $category, $index, $company, $is_directory);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            // $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc),0,  50).'...' : strip_tags($row->desc));
            $row->desc = (!empty($row->desc) ? strip_tags($row->desc) : '');
            $row->isBookmark = self::isBookmark('News', $row->id);
            $row->isLogin = self::isLogin();
            $row->views = $row->views == null ? 0 : $row->views;
        }
        return $data;
    }
    public static function getRandomNews($is_directory = 'Yes', $type)
    {
        $data = News::getRandom($is_directory, $type);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y, H:i A', strtotime($row->date_news)) : '');
            // $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc),0,  50).'...' : strip_tags($row->desc));
            $row->desc = (!empty($row->desc) ? strip_tags($row->desc) : '');
            $row->isBookmark = self::isBookmark('News', $row->id);
            $row->isLogin = self::isLogin();
            $row->views = $row->views == null ? 0 : $row->views;
        }
        return $data;
    }

    public static function paginateWithFilterAllStatus($search, $tags, $category, $filter = null, $company = null, $is_directory = 'Yes')
    {
        $data = News::paginateWithFilterAllStatus($search, $tags, $category, $filter, $company, $is_directory);
        foreach ($data as $x => $row) {
            $row->title = (strlen($row->title) > 100 ? substr($row->title, 0,  100) . '...' : $row->title);
            $row->image = (!empty($row->image) ? asset($row->image) : '');
            $row->date_news = (!empty($row->date_news) ? date('d M Y', strtotime($row->date_news)) : '');
            $row->last_update = (!empty($row->last_update) ? date('d M Y', strtotime($row->last_update)) : '');
            $row->date_created_at = (!empty($row->created_at) ? date('d M Y', strtotime($row->created_at)) : '');
            $row->desc = (strlen(strip_tags($row->desc)) > 50 ? substr(strip_tags($row->desc), 0,  50) . '...' : strip_tags($row->desc));
            $row->views = $row->views == null ? 0 : $row->views;
            $row->share = $row->share == null ? 0 : $row->share;
            $row->highlight = $row->highlight == 'Yes' ? 'Publish' : 'Unpublish';
            $row->isBookmark = self::isBookmark('News', $row->id);
            $row->isLogin = self::isLogin();
        }
        return $data;
    }
}
