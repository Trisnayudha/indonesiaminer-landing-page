<?php

namespace App\Http\Controllers;

use App\Helpers\EmailSender;
use App\Models\CallForPaper;
use Illuminate\Http\Request;

class CallForPaperController extends Controller
{
    public function index()
    {
        return view('call-for-paper.index');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'full_name'                 => 'required',
            'job_title'                 => 'required',
            'company_name'              => 'required',
            'company_address'           => 'required',
            'email'                     => 'required|email',
            'mobile_number'             => 'required',
            'category'                  => 'required|array',
            'session'                   => 'required',
            'abstract_title'            => 'required',
            'presentation_description'  => 'required',
            'learning_objectives'       => 'required',
            'presented_before'          => 'required',
            'bio'                       => 'required',
            'additional_comments'       => 'nullable',
        ]);

        // Simpan data ke database
        $submission =  CallForPaper::create($validatedData);
        // Siapkan data untuk email
        $data = [
            'submission' => $submission,
        ];

        // Daftar email penerima
        $emails = ['niema@indonesiaminer.com', 'info@indonesiaminer.com'];

        // Loop untuk mengirim email ke masing-masing penerima
        foreach ($emails as $email) {
            $send = new EmailSender();
            $send->template = 'email.call-for-paper.regis'; // Pastikan path template benar
            $send->data = $data;
            $send->from = env('EMAIL_SENDER');
            $send->name_sender = env('EMAIL_NAME');
            $send->to = $email;
            $send->subject = 'Register Call For Paper 2025 - ' . $submission->full_name;
            $send->sendEmail();
        }

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Your submission has been received.');
    }
}
