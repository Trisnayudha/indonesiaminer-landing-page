<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Repositories\MsPhoneCode;
use App\Services\EventsService;
use App\Services\MdAdsBannerService;
use App\Services\MdAdsService;
use App\Services\NewsBannerService;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data['banners'] = NewsBannerService::listAll();
        $bannersPluck = NewsBannerService::listAllToArray();
        $data['news'] = NewsService::listAllNewsOnlySearch($search, $bannersPluck);
        $data['phone_code'] = MsPhoneCode::showAll();
        $data['upcomingEvents'] = EventsService::listUpcomingEvents();
        $data['ads'] = MdAdsService::listLimitAds();
        $data['bannerAds'] = MdAdsBannerService::findRandom();
        return view('news.index', $data);
    }

    public function detail($slug)
    {

        $find = News::where('slug', $slug)->first();
        if (!empty($find->id)) {
            $data['slug'] = base64_encode($slug);
            $data['title'] = (!empty($find->title) ? $find->title : '');
            $data['form'] = (object)[
                "id" => (!empty($find->id) ? $find->id : 0),
                "title" => (!empty($find->title) ? $find->title : ''),
                "slug" => (!empty($find->slug) ? $find->slug : ''),
                "image" => (!empty($find->image) ? asset($find->image) : ''),
                "location" => (!empty($find->location) ? $find->location : ''),
                "reference_name" => (!empty($find->reference_name) ? $find->reference_name : ''),
                "reference_link" => (!empty($find->reference_link) ? $find->reference_link : ''),
                "date_news" => (!empty($find->date_news) ? date('D d M Y, H:i A', strtotime($find->date_news)) : ''),
                "desc" => (!empty($find->desc) ? $find->desc : ''),
            ];
            $data['ads'] = MdAdsService::listAds();
            $data['phone_code'] = MsPhoneCode::showAll();
            $data['relate'] = NewsService::newListRelateNews($find->news_category_id, $find->id, null);
            $data['bannerAds'] = MdAdsBannerService::findRandom();
            return view('news.news-detail', $data);
        } else {
            abort(403, 'News is not found');
        }
    }
}
