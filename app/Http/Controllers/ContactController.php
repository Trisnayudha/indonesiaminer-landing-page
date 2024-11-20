<?php

namespace App\Http\Controllers;

use App\Helpers\EmailSender;
use App\Models\ContactUs;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function postNewsSubcribe(Request $request)
    {
        $email = $request->email_subcribe;
        $email2 = $request->email_2;
        $name = $request->name;
        $name2 = $request->name_2;

        // Validasi reCAPTCHA
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),
            ]
        ]);
        $body = json_decode((string) $response->getBody());

        if (!$body->success) {
            // reCAPTCHA verification failed
            // dd('Eror');
            Alert::error('Captcha Error', 'Invalid reCAPTCHA');
            return redirect()->back();
        }

        try {
            // dd("masuk");
            if ($email != null) {
                Newsletter::subscribeOrUpdate($email, ['FNAME' => $name]);
                Newsletter::subscribe($email);
                $subscribe = DB::table('news_subscribe')->insert([
                    'email' => $email,
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                Newsletter::subscribeOrUpdate($email2, ['FNAME' => $name2]);
                Newsletter::subscribe($email2);
                $subscribe = DB::table('news_subscribe')->insert([
                    'email' => $email2,
                    'name' => $name2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Alert::success('Sending', 'Success Subcribe Newsletter');
            return redirect()->back();
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
        }
    }


    public function postExhibition(Request $request)
    {
        $company_name = $request->company_name;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;

        try {
            $data = [
                'name' => $name,
                'email' => $email,
                'company_name' => $company_name,
                'phone' => $phone,
            ];
            $send = new EmailSender();
            $send->to = 'izom@indonesiaminer.com';
            $send->from = env('EMAIL_SENDER');
            $send->data = $data;
            $send->subject = 'Opportunities Exhibition from ' . $name;
            $send->template = 'email.contact-us';
            $send->sendEmail();

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Your exhibition request has been successfully sent.');
        } catch (\Exception $msg) {
            // Redirect kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Failed to send your exhibition request. Please try again.');
        }
    }

    public function postSponsorship(Request $request)
    {
        $company_name = $request->company_name_sponsor;
        $name = $request->name_sponsor;
        $email = $request->email_sponsor;
        $phone = $request->phone_sponsor;

        try {
            $data = [
                'name' => $name,
                'email' => $email,
                'company_name' => $company_name,
                'phone' => $phone,
            ];
            $send = new EmailSender();
            $send->to = 'izom@indonesiaminer.com';
            $send->from = env('EMAIL_SENDER');
            $send->data = $data;
            $send->subject = 'Opportunities Sponsorship from ' . $name;
            $send->template = 'email.contact-us';
            $send->sendEmail();

            // Redirect kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Your sponsorship request has been successfully sent.');
        } catch (\Exception $msg) {
            // Redirect kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Failed to send your sponsorship request. Please try again.');
        }
    }


    public function postInterest(Request $request)
    {
        try {
            // $validator = Validator::make($request->all(), [
            //     'name_interest' => 'required',
            //     'email_interest' => 'required|email',
            //     'job_title_interest' => 'required',
            //     'company_interest' => 'required',
            //     'eventType' => 'required',
            //     // 'phone' => 'required',
            // ]);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'status' => 0,
            //         'message' => 'Please fill in all required fields.'
            //     ]);
            // }
            $save = new ContactUs();
            $save->name = $request->name_interest;
            $save->email = $request->email_interest;
            $save->job_title = $request->job_title_interest;
            $save->company = $request->company_interest;
            $save->inqury = $request->eventType;
            $save->phone = $request->phone;
            $save->save();
            $data = [
                'name' => $request->name_interest,
                'email' => $request->email_interest,
                'job_title' => $request->job_title_interest,
                'company' => $request->company_interest,
                'inqury' => $request->eventType,
                'phone' => $request->phone,
            ];
            $send = new EmailSender();
            $send->to = 'izom@indonesiaminer.com';
            $send->from = env('EMAIL_SENDER');
            $send->data = $data;
            $send->subject = 'Interesting Indonesia Miner 2025 from ' . $request->name_interest;
            $send->template = 'email.contact-us-interest';
            $send->sendEmail();
            return response()->json([
                'status' => 1,
                'message' => 'Our representative will get in touch with you shortly.'
            ]);
        } catch (\Exception $msg) {
            $res['status'] = 0;
            $res['message'] = $msg->getMessage();
            return $res;
        }
    }
}
