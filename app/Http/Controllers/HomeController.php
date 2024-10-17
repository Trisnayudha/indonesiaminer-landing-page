<?php

namespace App\Http\Controllers;

use App\Helpers\ScrapeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['job_title'] = DB::table('ms_job_title_main')->get();
        $data['rate_idr'] = ScrapeHelper::scrapeExchangeRate();
        return view('home.home', $data);
    }
}
