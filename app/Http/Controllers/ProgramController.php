<?php

namespace App\Http\Controllers;

use App\Services\EventsScheduleService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

    public function index(Request $request)
    {
        return view('program.index');
    }
    public function getListCalendarSchedule(Request $request)
    {
        try {
            $id = $request->query('id');

            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = EventsScheduleService::listSchedule($id);
            return response()->json($res, 200);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return response()->json($res, 500);
        }
    }

    public function getListCalendarWorkshop(Request $request)
    {
        try {
            $id = $request->query('id');

            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = EventsScheduleService::listWorkshop($id);
            return response()->json($res, 200);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return response()->json($res, 500);
        }
    }

    public function getListCalendarMinistage(Request $request)
    {
        try {
            $id = $request->query('id');

            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = EventsScheduleService::listMinistage($id);
            return response()->json($res, 200);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return response()->json($res, 500);
        }
    }

    public function getListSchedule(Request $request)
    {
        try {
            $id = $request->query('id');
            $date = $request->query('date');

            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = EventsScheduleService::listScheduleByDate($id, $date);
            return response()->json($res, 200);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return response()->json($res, 500);
        }
    }

    public function getListWorkshop(Request $request)
    {
        try {
            $id = $request->query('id');
            $date = $request->query('date');

            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = EventsScheduleService::listWorkshopByDate($id, $date);
            return response()->json($res, 200);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return response()->json($res, 500);
        }
    }

    public function getListMinistage(Request $request)
    {
        try {
            $id = $request->query('id');
            $date = $request->query('date');

            $res['status'] = 1;
            $res['message'] = 'success';
            $res['item'] = EventsScheduleService::listMinistageByDate($id, $date);
            return response()->json($res, 200);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return response()->json($res, 500);
        }
    }
}
