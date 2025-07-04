<?php

namespace App\Http\Controllers;

use App\Helpers\ScrapeHelper;
use App\Services\EventsCompanyService;
use App\Services\MdAssociationService;
use App\Services\MdChargingService;
use App\Services\MdKnowledgePartnerService;
use App\Services\MdLandyarkService;
use App\Services\MdLunchService;
use App\Services\MdMediaPartnerService;
use App\Services\MdMedicalService;
use App\Services\MdRegistrationService;
use App\Services\MdSponsorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data['job_title'] = DB::table('ms_job_title_main')->get();
        return view('home.index', $data);
    }
    // di HomeController.php
    public function section($name)
    {
        $allowed = [
            'jarallax',
            'marque',
            'changing',
            'video',
            'speakers',
            'faq',
            'photo',
            'foim',
            'minerstalk',
            'subscribenews'
        ];

        if (! in_array($name, $allowed)) {
            abort(404);
        }

        return view("home.section.{$name}");
    }
}
