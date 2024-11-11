<?php

namespace App\Http\Controllers;

use App\Models\MdAssociationModel;
use App\Models\MdChargingModel;
use App\Models\MdKnowledgePartnerModel;
use App\Models\MdLandyarkModel;
use App\Models\MdLunchModel;
use App\Models\MdMediaPartnerModel;
use App\Models\MdMedicalModel;
use App\Models\MdRegistrationModel;
use App\Models\MdSponsorModel;
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
        $data['landyard'] = MdLandyarkService::listAllHome();
        $data['exhibitor'] = EventsCompanyService::listExhibitionSponsor(12, 50);

        // dd($data);
        return view('sponsors.index', $data);
    }

    public function postDetailModalSearch()
    {
        try {
            $id = request('id');
            $type = request('type');

            // Peta tipe ke model yang sesuai
            $modelMap = [
                'Sponsor'            => MdSponsorModel::class,
                'Media Partner'      => MdMediaPartnerModel::class,
                'Association'        => MdAssociationModel::class,
                'landyard'           => MdLandyarkModel::class,
                'lunch'              => MdLunchModel::class,
                'Knowledge Partner'  => MdKnowledgePartnerModel::class,
                'registration'       => MdRegistrationModel::class,
                'charging'           => MdChargingModel::class,
                'Medical Partner'    => MdMedicalModel::class,
            ];

            // Validasi tipe
            if (!isset($modelMap[$type])) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Invalid type provided.',
                ], 400);
            }

            // Mengambil model yang sesuai
            $modelClass = $modelMap[$type];

            // Mencari data berdasarkan ID
            $find = $modelClass::find($id);

            // Jika data tidak ditemukan
            if (!$find) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Data not found.',
                ], 404);
            }

            // Menyiapkan respon
            $res = [
                'status'  => 1,
                'message' => 'Success',
                'item'    => [
                    'id'    => $find->id ?? 0,
                    'name'  => $find->name ?? '',
                    'link'  => $find->link ?? '',
                    'desc'  => $find->desc ?? '',
                    'image' => $find->image ? 'https://indonesiaminer.com/' . $find->image : '',
                ],
            ];

            return response()->json($res, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
