<?php

namespace App\Http\Controllers;

use App\Helpers\WhatsappApi;
use App\Helpers\XenditInvoice;
use App\Models\BookingModel;
use App\Models\Events;
use App\Models\Payment;
use App\Models\Users;
use App\Models\PaymentInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\Facade\Pdf; // Menggunakan DOMPDF
use Xendit\Invoice;
use Xendit\Xendit;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        try {
            // Validasi data request
            $validatedData = $request->validate([
                // Validasi data peserta
                'name'                       => 'array',
                'name.*'                     => 'string|max:255',
                'email'                      => 'array',
                'email.*'                    => 'email',
                'phone'                      => 'array',
                'phone.*'                    => 'string',
                'job_title'                  => 'array',
                'job_title.*'                => 'string',
                'company'                    => 'array',
                'company.*'                  => 'string',
                'job_title_detail'           => 'sometimes|array',
                'job_title_detail.*'         => 'nullable|string',

                // Validasi data kontak pemesanan
                'name_booking'               => 'string|max:255',
                'email_booking'              => 'email',
                'phone_booking'              => 'string',
                'job_title_booking'          => 'string|nullable',
                'company_booking'            => 'string|nullable',
                'city'                       => 'string|nullable',
                'country'                    => 'string|nullable',
                'zip'                        => 'string|nullable',
                'company_website'            => 'string|nullable',

                // Validasi detail acara
                'events_id_new'              => 'integer|exists:events,id',
                'events_tickets_id_new'      => 'integer',
                'events_tickets_title_new'   => 'string',
                'price_rupiah_new'           => 'numeric',
                'price_dollar_new'           => 'numeric',
                'total_price_val_new'        => 'numeric',
                'total_price_dollar_val_new' => 'numeric',
                'voucher_price_new'          => 'numeric|nullable',
                'voucher_price_dollar_new'   => 'numeric|nullable',
                'voucher_code'               => 'string|nullable',
                'rate_idr'                   => 'numeric',
            ]);

            // Mulai transaksi database
            DB::beginTransaction();

            // Ambil data acara
            $event = Events::findOrFail($request->input('events_id_new'));

            // Buat kontak pemesanan
            $bookingContactData = [
                'name_contact'      => $request->input('name_booking'),
                'email_contact'     => $request->input('email_booking'),
                'phone_contact'     => $request->input('phone_booking'),
                'job_title_contact' => $request->input('job_title_booking'),
                'company_name'      => $request->input('company_booking'),
                'city'              => $request->input('city'),
                'company_website'   => $request->input('company_website'),
                'country'           => $request->input('country'),
                'portal_code'       => $request->input('zip'),
            ];

            $booking = BookingModel::create($bookingContactData);

            // Inisialisasi variabel
            $itemDetails       = [];
            $detailWa          = [];
            $totalPrice        = 0;
            $totalPriceDollar  = 0;
            $codePaymentList   = Payment::arrayCode();

            // Kumpulkan data peserta
            $attendeeFields = ['name', 'email', 'phone', 'job_title', 'company', 'job_title_detail'];
            $attendeeDataArrays = $request->only($attendeeFields);

            // Pastikan semua array memiliki jumlah elemen yang sama
            $attendeeCount = count($attendeeDataArrays['name']);

            foreach ($attendeeFields as $field) {
                if (count($attendeeDataArrays[$field]) !== $attendeeCount) {
                    // Tangani error atau isi nilai yang hilang jika diperlukan
                    throw new \Exception("Semua bidang peserta harus memiliki jumlah elemen yang sama.");
                }
            }

            // Transpose array
            $attendeeDataArray = array_map(
                function (...$items) use ($attendeeFields) {
                    return array_combine($attendeeFields, $items);
                },
                ...array_values($attendeeDataArrays)
            );

            // Konversi ke koleksi
            $attendeeData = collect($attendeeDataArray);

            // Ambil pengguna yang sudah ada untuk meminimalkan query
            $existingUsers = Users::whereIn('email', $attendeeData->pluck('email'))->get()->keyBy('email');

            // Proses setiap peserta
            foreach ($attendeeData as $attendee) {
                // Cari atau buat pengguna
                $user = $existingUsers->get($attendee['email']);

                if (!$user) {
                    $user = Users::create([
                        'name'              => $attendee['name'],
                        'email'             => $attendee['email'],
                        'phone'             => $attendee['phone'],
                        'job_title'         => $attendee['job_title'],
                        'job_title_detail'  => $attendee['job_title_detail'],
                        'company_name'      => $attendee['company'],
                        'city'              => strtoupper($bookingContactData['city']),
                        'country'           => strtoupper($bookingContactData['country']),
                        'post_code'         => $bookingContactData['portal_code'],
                        'company_web'       => $bookingContactData['company_website'],
                        'password'          => Hash::make('IM2025'),
                        'is_register'       => 1,
                    ]);
                }

                // Generate kode pembayaran unik
                $codePayment = strtoupper(Str::random(7));

                // Siapkan data pembayaran
                $paymentData = [
                    'events_id'             => $event->id,
                    'users_id'              => $user->id,
                    'code_payment'          => $codePayment,
                    'type'                  => 'Events Delegate',
                    'package_id'            => $request->input('events_tickets_id_new'),
                    'package'               => $request->input('events_tickets_title_new'),
                    'status'                => 'Waiting',
                    'event_price'           => $request->input('price_rupiah_new'),
                    'event_price_dollar'    => $request->input('price_dollar_new'),
                    'total_price'           => $request->input('total_price_val_new'),
                    'total_price_dollar'    => $request->input('total_price_dollar_val_new'),
                    'aproval_quota_users'   => 0,
                    'voucher_price'         => $request->input('voucher_price_new'),
                    'voucher_price_dollar'  => $request->input('voucher_price_dollar_new'),
                    'voucher_code'          => $request->input('voucher_code'),
                    'booking_id'            => $booking->id,
                    'rate_idr'              => $request->input('rate_idr'),
                ];

                // Cari atau buat pembayaran
                $payment = Payment::firstOrNew([
                    'events_id' => $event->id,
                    'users_id'  => $user->id,
                ]);

                $paidoff = false;

                if (!$payment->exists || in_array($payment->status, ['Waiting', 'Expired', 'trash'])) {
                    $payment->fill($paymentData);
                    $payment->save();

                    // Akumulasi total harga
                    $totalPrice       += $paymentData['event_price'];
                    $totalPriceDollar += $paymentData['event_price_dollar'];
                } else {
                    $paidoff = true;
                }

                // Siapkan detail item untuk invoice dan pesan WhatsApp
                $itemDetails[] = [
                    'name'      => $attendee['name'],
                    'job_title' => $attendee['job_title'],
                    'price'     => number_format($paymentData['event_price'], 0, ',', '.'),
                    'paidoff'   => $paidoff,
                ];

                $detailWa[] = "
Name: {$attendee['name']}
Email: {$attendee['email']}
Phone Number: {$attendee['phone']}
Company: {$attendee['company']}
Code Payment: $codePayment
";
            }

            // Set API key Xendit
            $secretKey = env('XENDIT_ISPROD') ? env('XENDIT_SECRET_KEY_PROD') : env('XENDIT_SECRET_KEY_TEST');
            Xendit::setApiKey($secretKey);

            // Buat invoice via Xendit
            $codePayment = $codePayment ?? strtoupper(Str::random(7)); // Pastikan $codePayment terisi

            $invoiceParams = [
                'external_id'          => $codePayment,
                'payer_email'          => $bookingContactData['email_contact'],
                'description'          => 'Invoice Events Indonesia Miner ' . $event->name,
                'amount'               => $totalPrice,
                'success_redirect_url' => url('/'),
                'failure_redirect_url' => url('/'),
            ];

            $createInvoice = Invoice::create($invoiceParams);
            $booking->update(['link' => $createInvoice['invoice_url']]);

            // Simpan detail invoice
            $save = new PaymentInvoice();
            $save->payment_code   = $createInvoice['external_id'];
            $save->payment_id     = $payment->id;
            $save->users_id       = $user->id;
            $save->transaction_id = $createInvoice['id'];
            $save->status         = $createInvoice['status'];
            $save->ammount        = $createInvoice['amount'];
            $save->payer_email    = $createInvoice['payer_email'];
            $save->description    = $createInvoice['description'];
            $save->expiry_date    = $createInvoice['expiry_date'];
            $save->invoice_url    = $createInvoice['invoice_url'];
            $save->currency       = $createInvoice['currency'];
            $save->save();

            // Siapkan data untuk email dan WhatsApp
            $emailData = [
                'name'         => $bookingContactData['name_contact'],
                'email'        => $bookingContactData['email_contact'],
                'phone'        => $bookingContactData['phone_contact'],
                'company_name' => $bookingContactData['company_name'],
                'item'         => $itemDetails,
                'link'         => $createInvoice['invoice_url'],
                'status'       => 'Waiting',
                'total_price'  => number_format($totalPrice, 0, ',', '.'),
                'create_date'  => now()->format('d, M Y H:i'),
                'code_payment' => $codePayment,
                'events_name'  => $event->name,
                'voucher_price' => 0
            ];

            // Kirim pesan WhatsApp
            $whatsappApi = new WhatsappApi();
            $whatsappApi->phone   = '120363347094951003'; // Sementara dinonaktifkan
            // $whatsappApi->phone   = '083829314436';
            $whatsappApi->message = "
Hello,

Someone has registered for the event {$event->name}.

Ticket : {$request->events_tickets_title_new}.
Rate IDR: " . number_format($request->rate_idr, 0, ',', '.') . "
Total USD: " . number_format($request->total_price_dollar_val_new, 0, ',', '.') . "
Total IDR: " . number_format($request->total_price_val_new, 0, ',', '.') . "

Registration details:
" . implode("\n", $detailWa) . "

Thank you,
Best Regards,
Bot IM
";
            $whatsappApi->WhatsappMessageGroup();

            // Generate PDF invoice dan kirim email menggunakan DOMPDF
            set_time_limit(300); // Perpanjang waktu eksekusi jika diperlukan

            // Generate konten HTML dari view
            $html = view('email.invoice-new-multiple', $emailData)->render();

            // Menggunakan DOMPDF untuk membuat PDF
            $pdf = Pdf::loadHTML($html);

            // Atur ukuran kertas dan orientasi jika diperlukan
            $pdf->setPaper('A4', 'portrait');

            // Dapatkan output PDF sebagai string
            $pdfOutput = $pdf->output();

            // Kirim email dan lampirkan PDF
            Mail::send('email.invoice-new-multiple', $emailData, function ($message) use ($bookingContactData, $pdfOutput) {
                $message->from(env('EMAIL_SENDER'));
                $message->to($bookingContactData['email_contact']);
                $message->subject('Invoice Waiting Payment Indonesia Miner 2025');
                $message->attachData($pdfOutput, 'Invoice-' . time() . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
            });

            // Commit transaksi
            DB::commit();

            return redirect()->back()->with('success', 'Kami akan mengirimkan invoice ke alamat email ' . $bookingContactData['email_contact']);
        } catch (ValidationException $e) {
            // Rollback transaksi jika validasi gagal
            DB::rollBack();

            // Log error validasi
            Log::warning('Validasi gagal: ', $e->validator->errors()->toArray());

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();
            Log::error('Terjadi kesalahan dalam proses pembayaran: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
