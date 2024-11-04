<?php

namespace App\Http\Controllers;

use App\Services\EventsSpeakerListService;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        $data['speaker'] = EventsSpeakerListService::listSpeakerSchedule(12, null);
        // dd($data);
        return view('speakers.index', $data);
    }

    public function listOfSpeaker(Request $request)
    {
        $perPage = $request->get('perPage', 8); // Jumlah default item per halaman
        $data = EventsSpeakerListService::listSpeakerSchedule(12, $perPage);
        return response()->json($data);
    }
}
