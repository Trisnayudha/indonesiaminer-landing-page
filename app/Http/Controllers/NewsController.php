<?php

namespace App\Http\Controllers;

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
}
