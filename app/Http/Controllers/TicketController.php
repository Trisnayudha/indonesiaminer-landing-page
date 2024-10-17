<?php

namespace App\Http\Controllers;

use App\Helpers\ScrapeHelper;
use App\Helpers\WhatsappApi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $job_title_main = DB::table('ms_job_title_main')->get();
        $job_title_submain = DB::table('ms_job_title_submain')->get();

        // Mengelompokkan job_title_submain berdasarkan tier
        $groupedJobTitles = $job_title_submain->groupBy('tier')->map(function ($item) {
            return $item->pluck('job_title');
        });
        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'job_title_main' => $job_title_main,
            'grouped_job_titles' => $groupedJobTitles
        ];
        $data['rate_idr'] = ScrapeHelper::scrapeExchangeRate();
        if ($request->email != null || $request->name != null || $request->phone != null || $request->company_name != null || $request->job_title != null) {
            // Periksa apakah pesan sudah dikirim sebelumnya
            if (!$request->session()->has('whatsapp_sent')) {
                $send = new WhatsappApi();
                $send->phone = '083829314436';
                $send->message = '
Data Click Payment
Name:' . $request->name . '
Email:' . $request->email . '
Phone:' . $request->phone . '
Company Name:' . $request->company_name . '
Job Title:' . $request->job_title . '
';

                $send->WhatsappMessage();

                // Set session untuk menandai bahwa pesan sudah dikirim
                $request->session()->put('whatsapp_sent', true, 30);
            }
            $save = DB::table('payment_interest')->insert([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'job_title' => $request->job_title,
                'email' => $request->email,
                'phone' => $request->phone,
                'created_at' => Carbon::now()
            ]);
        }

        return view('ticket.index', $data);
    }
}
