<?php

namespace App\Http\Controllers;

use App\Services\MdAssociationService;
use App\Services\MdChargingService;
use App\Services\MdKnowledgePartnerService;
use App\Services\MdLunchService;
use App\Services\MdMediaPartnerService;
use App\Services\MdMedicalService;
use App\Services\MdRegistrationService;
use App\Services\MdSponsorService;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $data['sponsor_platinum2024'] = MdSponsorService::listAllHome2024('Platinum', 5);
        $data['sponsor_gold2024'] = MdSponsorService::listAllHome2024('Gold', 5);
        $data['sponsor_silver2024'] = MdSponsorService::listAllHome2024('Silver', 6);
        $data['support_association2024'] = MdAssociationService::listAllHome2024();
        $data['media_partner2024'] = MdMediaPartnerService::listAllHome2024();
        $data['knowledge_partner2024'] = MdKnowledgePartnerService::listAllHome2024();
        $data['medical'] = MdMedicalService::listAllHome();
        $data['charging'] = MdChargingService::listAllHome();
        $data['registration'] = MdRegistrationService::listAllHome();
        $data['lunch'] = MdLunchService::listAllHome();
        return view('sponsors.index');
    }
}
