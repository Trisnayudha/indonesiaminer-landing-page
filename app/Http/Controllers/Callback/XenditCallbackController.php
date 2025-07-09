<?php

namespace App\Http\Controllers\Callback;

use App\Helpers\EmailSender;
use App\Helpers\WhatsappApi;
use App\Helpers\XenditInvoice;
use App\Traits\Payment as TraitPayment;
use App\Traits\PaymentRegisterSponsors as TraitPaymentRegisterSponsors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use App\Models\Company;
use App\Models\CompanyRegPay;
use App\Models\Events;
use App\Models\ExhibitionCartList;
use App\Models\ExhibitionPayment;
use App\Models\MsPhoneCode;
use App\Models\Payment;
use App\Models\UsersCompany;
use App\Models\UsersDelegate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // Menggunakan DOMPDF
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class XenditCallbackController extends Controller
{
    use TraitPayment, TraitPaymentRegisterSponsors;

    /**
     * Handle the Xendit invoice callback.
     */
    public function postInvoiceNew()
    {
        DB::beginTransaction();
        try {
            // Mengambil data dari request
            $requestData = $this->getRequestData();

            // Mengecek jenis pembayaran dan memproses sesuai tipe
            // if ($this->isMiningDirectoryPayment($requestData['external_id'])) {
            // $response = $this->processMiningDirectoryPayment($requestData);
            // }
            if ($this->isExhibitionPayment($requestData['external_id'])) {
                $response = $this->processExhibitionPayment($requestData);
            } else {
                $response = $this->processOtherPayment($requestData);
            }

            DB::commit();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();

            $res['api_status'] = 0;
            $res['api_message'] = $e->getMessage();
            return response()->json($res, 500);
        }
    }

    /**
     * Mengambil data request dari callback Xendit.
     *
     * @return array
     */
    private function getRequestData()
    {
        return request()->only([
            'id',
            'external_id',
            'user_id',
            'is_high',
            'payment_method',
            'status',
            'merchant_name',
            'amount',
            'paid_amount',
            'bank_code',
            'paid_at',
            'payer_email',
            'description',
            'adjusted_received_amount',
            'fees_paid_amount',
            'updated',
            'created',
            'currency',
            'payment_channel',
            'payment_destination',
        ]);
    }

    /**
     * Mengecek apakah pembayaran adalah untuk Mining Directory.
     *
     * @param string $external_id
     * @return bool
     */
    private function isMiningDirectoryPayment($external_id)
    {
        return $this->checkIsPaymentMiningDirectory($external_id);
    }

    /**
     * Mengecek apakah pembayaran adalah untuk Exhibition/Sponsor.
     *
     * @param string $external_id
     * @return bool
     */
    private function isExhibitionPayment($external_id)
    {
        return $this->checkIsPaymentRegSponsor($external_id);
    }

    /**
     * Memproses pembayaran untuk Mining Directory.
     *
     * @param array $data
     * @return array
     */
    private function processMiningDirectoryPayment($data)
    {
        $paymentReg = CompanyRegPay::where('code', $data['external_id'])->first();

        if (empty($paymentReg->id)) {
            return [
                'api_status' => 0,
                'api_message' => 'Payment is not found',
            ];
        }

        $this->saveXenditInvoice($paymentReg->id, $paymentReg->company_id, $data);

        if ($data['status'] === 'PAID') {
            $this->updatePaymentRegStatus($paymentReg, $data['payment_channel'], 'Paid Off', 1);
            $this->saveCompanyRegSponsor($paymentReg);
            $this->updateCompanyRegistration($paymentReg->company_id);
            $this->sendMiningDirectoryReceipt($paymentReg);
        } else {
            $this->updatePaymentRegStatus($paymentReg, null, 'Expired', 0);
        }

        return [
            'api_status' => 1,
            'api_message' => 'Payment status is updated',
        ];
    }

    /**
     * Memproses pembayaran untuk Exhibition/Sponsor.
     *
     * @param array $data
     * @return array
     */
    private function processExhibitionPayment($data)
    {
        $exhibitionPayment = ExhibitionPayment::where('code_payment', $data['external_id'])->first();

        if (!$exhibitionPayment) {
            return [
                'api_status' => 0,
                'api_message' => 'Payment is not found',
            ];
        }

        if ($data['status'] === 'PAID') {

            $this->updateExhibitionPaymentStatus($exhibitionPayment, 'paid');
            $this->sendExhibitionPaymentSuccessEmail($exhibitionPayment, $data);
            $this->notifyExhibitionPaymentSuccess($data);
            $this->updateDelegateExhibitionStatus($exhibitionPayment, $data);
        } elseif ($data['status'] === 'EXPIRED') {
            $this->updateExhibitionPaymentStatus($exhibitionPayment, 'Expired');
        }

        return [
            'api_status' => 1,
            'api_message' => 'Payment status is updated',
        ];
    }

    /**
     * Memproses pembayaran lainnya.
     *
     * @param array $data
     * @return array
     */
    private function processOtherPayment($data)
    {
        $payment = Payment::where('code_payment', $data['external_id'])->first();

        if (empty($payment)) {
            return [
                'api_status' => 0,
                'api_message' => 'Payment is not found',
            ];
        }
        if ($data['status'] === 'PAID') {
            if ($payment->booking_id) {
                $this->processBookingPayment($payment, $data);
            } else {
                $this->processSinglePayment($payment, $data);
            }
            $dataPayment = [
                "id" => $data['id'],
                "external_id" => $data['external_id'],
                "status" => $data['status'],
                "merchant_name" => $data['merchant_name'],
                "merchant_profile_picture_url" => null,
                "amount" => $data['amount'],
                "payer_email" => $data['payer_email'],
                "description" => $data['description'],
                "expiry_date" => null,
                "invoice_url" => null,
                "currency" => $data['currency'],
            ];
            XenditInvoice::saveInvoice($payment->id, $payment->users_id, $dataPayment);
        } else {
            $this->updatePaymentStatus($payment, 'Expired');
        }
        // dd($data);

        return [
            'api_status' => 1,
            'api_message' => 'Payment status is updated',
        ];
    }

    // === Helper Methods ===

    /**
     * Menyimpan data invoice Xendit untuk pembayaran Mining Directory.
     *
     * @param int $paymentId
     * @param int $companyId
     * @param array $data
     */
    private function saveXenditInvoice($paymentId, $companyId, $data)
    {
        $invoiceData = [
            "id" => $data['id'],
            "external_id" => $data['external_id'],
            "status" => $data['status'],
            "merchant_name" => $data['merchant_name'],
            "merchant_profile_picture_url" => null,
            "amount" => $data['amount'],
            "payer_email" => $data['payer_email'],
            "description" => $data['description'],
            "expiry_date" => null,
            "invoice_url" => null,
            "currency" => $data['currency'],
        ];

        // Simpan data invoice (Implementasikan sesuai kebutuhan)
        // XenditInvoice::saveInvoiceRegSponsor($paymentId, $companyId, $invoiceData);
    }

    /**
     * Memperbarui status pembayaran registrasi.
     *
     * @param CompanyRegPay $paymentReg
     * @param string|null $paymentChannel
     * @param string $status
     * @param int $approveSponsors
     */
    private function updatePaymentRegStatus($paymentReg, $paymentChannel, $status, $approveSponsors)
    {
        $paymentReg->status = $status;
        $paymentReg->approve_sponsors = $approveSponsors;
        $paymentReg->payment_method = $paymentChannel;
        $paymentReg->save();
    }

    /**
     * Mengirim email tanda terima untuk pembayaran Mining Directory.
     *
     * @param CompanyRegPay $paymentReg
     */
    private function sendMiningDirectoryReceipt($paymentReg)
    {
        $companyDetails = UsersCompany::detailForm($paymentReg->id);
        $data = $this->prepareReceiptData($companyDetails);

        // Optional: Perpanjang waktu eksekusi jika diperlukan
        // set_time_limit(300);

        // Generate konten HTML dari view
        $html = view('email.receipt.receipt', $data)->render();

        // Menggunakan DOMPDF untuk membuat PDF dari HTML
        $pdf = Pdf::loadHTML($html);

        // Atur ukuran kertas dan orientasi jika diperlukan
        $pdf->setPaper('A4', 'portrait');

        // Dapatkan output PDF sebagai string
        $pdfOutput = $pdf->output();

        // Kirim email dan lampirkan PDF
        Mail::send('email.directory.payment.payment', $data, function ($message) use ($pdfOutput, $companyDetails) {
            $message->from(env('EMAIL_SENDER'));
            $message->to($companyDetails->email);
            $message->subject('Thank You For Payment - Indonesia Miner');
            $message->attachData($pdfOutput, 'E-Receipt_' . $companyDetails->code . '.pdf', [
                'mime' => 'application/pdf',
            ]);
        });
    }

    /**
     * Memperbarui status registrasi perusahaan.
     *
     * @param int $companyId
     */
    private function updateCompanyRegistration($companyId)
    {
        $company = Company::find($companyId);
        if ($company) {
            $company->is_register = 1;
            $company->save();
        }
    }

    /**
     * Menyiapkan data tanda terima untuk pembayaran Mining Directory.
     *
     * @param UsersCompany $company
     * @return array
     */
    private function prepareReceiptData($company)
    {
        return [
            'name' => $company->name,
            'email' => $company->email,
            'company_name' => $company->company_name,
            'company_address' => $company->company_address,
            'status' => $company->status,
            'code' => $company->code,
            'created_at' => date('d, M Y H:i'),
            'package_name' => $company->package_name,
            'price' => number_format($company->price, 0, ',', '.'),
            'price_dollar' => number_format($company->price_dollar, 0, ',', '.'),
            'total_price' => number_format($company->total_price, 0, ',', '.'),
            'total_price_dollar' => number_format($company->total_price_dollar, 0, ',', '.'),
        ];
    }

    /**
     * Memperbarui status pembayaran exhibition.
     *
     * @param ExhibitionPayment $exhibitionPayment
     * @param string $status
     */
    private function updateExhibitionPaymentStatus($exhibitionPayment, $status)
    {
        $exhibitionPayment->status = $status;
        $exhibitionPayment->save();
    }

    private function updateDelegateExhibitionStatus($exhibitionPayment, $data)
    {
        $delegates = ExhibitionCartList::join('exhibition_payment', 'exhibition_payment.id', 'exhibition_cart_list.payment_id')
            ->join('payment', 'payment.id', 'exhibition_cart_list.delegate_id')
            ->join('users', 'users.id', 'payment.users_id')
            ->where('payment_id', $exhibitionPayment->id)
            ->wherenotnull('exhibition_cart_list.delegate_id')
            ->select(
                'payment.id',
                'users.name',
                'users.email',
                'users.job_title',
                'users.phone',
                'users.company_name',
                'payment.events_id',
            )
            ->get();

        if ($delegates->isEmpty()) {
            return;
        }
        foreach ($delegates as $key) {
            $payment = Payment::find($key->id);
            if (!$payment) {
                continue;
            }

            $payment->status = 'Paid Off';
            $payment->aproval_quota_users = 1;
            $payment->trash = null;
            $payment->save();

            $delegateModel = UsersDelegate::firstOrNew(['payment_id' => $payment->id]);
            $delegateModel->users_id = $payment->users_id;
            $delegateModel->events_id = $payment->events_id;
            $delegateModel->package_id = $payment->package_id;
            $delegateModel->package_name = $payment->package;
            $delegateModel->payment_status = 'Paid Off';
            $delegateModel->save();
            $qrCodePath = $this->generateQRCode($payment->code_payment);

            $this->sendDelegateAccessEmail($key, $qrCodePath);
        }
    }

    /**
     * Mengirim email sukses pembayaran untuk Exhibition.
     *
     * @param ExhibitionPayment $exhibitionPayment
     * @param array $data
     */
    private function sendExhibitionPaymentSuccessEmail($exhibitionPayment, $data)
    {
        $items = ExhibitionCartList::join('exhibition_payment', 'exhibition_payment.id', 'exhibition_cart_list.payment_id')
            ->where('payment_id', $exhibitionPayment->id)
            ->where('exhibition_payment.code_payment', $data['external_id'])
            ->get();
        $payment = ExhibitionPayment::where('code_payment', $data['external_id'])->first();

        $company = Company::find($items[0]->company_id);
        $email = $company->pic_email ?? $company->email_alternate;

        $emailData = [
            'amount' => $data['amount'],
            'date' => $data['created'],
            'payment_method' => $data['payment_method'],
        ];

        $pdf = Pdf::loadView('email.portal.download', [
            'items' => $items,
            'company' => $company,
            'code_payment' => $data['external_id'],
            'surcharge' => $payment->surcharge
        ]);

        Mail::send('email.portal.success', $emailData, function ($message) use ($pdf, $data, $email) {
            $message->from(env('EMAIL_SENDER'));
            $message->to($email);
            $message->subject('Payment Success: Indonesia Miner 2025 - ' . $data['external_id']);
            $message->attachData($pdf->output(), $data['external_id'] . '-' . time() . '.pdf');
        });
    }

    /**
     * Mengirim notifikasi sukses pembayaran exhibition melalui WhatsApp.
     *
     * @param ExhibitionPayment $exhibitionPayment
     */
    private function notifyExhibitionPaymentSuccess($data)
    {
        $company = Company::where('email', $data['payer_email'])
            ->orWhere('pic_email', $data['payer_email'])
            ->first();

        if (!$company) {
            Log::warning("Company not found for payer_email: {$data['payer_email']}");
            return;
        }

        $whatsapp = new WhatsappApi();
        $whatsapp->phone = '083829314436';
        $whatsapp->message = 'Success payment from ' . $company->name;
        $whatsapp->WhatsappMessage();
    }

    /**
     * Memproses pembayaran dengan booking (beberapa pengguna).
     *
     * @param Payment $payment
     * @param array $data
     */
    private function processBookingPayment($payment, $data)
    {
        $payments = Payment::join('users', 'users.id', 'payment.users_id')
            ->where('booking_id', $payment->booking_id)
            ->select('users.*', 'payment.id as id', 'payment.*', 'payment.created_at as created_at')
            ->get();
        $itemDetails = [];
        $whatsappDetails = [];
        $result = [];
        foreach ($payments as $pay) {
            // Generate QR Code
            $qrCodePath = $this->generateQRCode($pay->code_payment);

            // Update payment status
            $this->updatePaymentStatus($pay, 'Paid Off', [
                'qr_code' => $qrCodePath,
                'payment_method' => $data['payment_method'],
                'aproval_quota_users' => 1,
                'trash' => null,
                'package' => 'Platinum',
                'created_at' => now()
            ]);
            // Save user delegate
            $this->saveUserDelegate($pay, $payment->events_id, $payment->package_id, $payment->package);

            // Prepare item details for email
            $itemDetails[] = $this->prepareItemDetails($pay);

            // Prepare WhatsApp notification details
            $whatsappDetails[] = $this->prepareWhatsappDetails($pay);

            // Send access email to delegate
            $this->sendDelegateAccessEmail($pay, $qrCodePath);
        }
        // Send receipt to booking contact
        $this->sendBookingPaymentReceipt($payment, $data, $itemDetails);

        // Notify team via WhatsApp
        $this->notifyBookingPaymentSuccess($whatsappDetails);
    }

    /**
     * Menghasilkan QR Code dan menyimpannya ke storage.
     *
     * @param string $codePayment
     * @return string
     */
    private function generateQRCode($codePayment)
    {
        // Generate SVG QR code
        $svg = QrCode::format('svg')
            ->size(200)
            ->errorCorrection('H')
            ->generate($codePayment);

        $fileName = 'qr-' . time() . '.svg';
        // Simpan ke disk public/uploads/…
        Storage::disk('public')->put('uploads/payment/qr-code/' . $fileName, $svg);

        // Kembalikan URL yang bisa diakses
        return Storage::url('uploads/payment/qr-code/' . $fileName);
    }

    /**
     * Memperbarui status pembayaran dan data tambahan.
     *
     * @param Payment $payment
     * @param string $status
     * @param array $additionalData
     */
    private function updatePaymentStatus($payment, $status, $additionalData = [])
    {
        $payment->status = $status;
        foreach ($additionalData as $key => $value) {
            $payment->$key = $value;
        }
        $result = $payment->save();

        if (!$result) {
            Log::error("Failed to update payment ID: {$payment->id}");

            // Kirim WhatsApp notifikasi error
            $whatsappApi = new WhatsappApi();
            $whatsappApi->phone   = '083829314436';
            $whatsappApi->message = "
Hello Admin,

Failed to update payment.

Payment ID: {$payment->id}
Code Payment: {$payment->code_payment}
User ID: {$payment->users_id}

Please check immediately.

Regards,
Bot IM
";
            $whatsappApi->WhatsappMessage();
        }

        return $payment;
    }

    /**
     * Menyimpan informasi delegate pengguna.
     *
     * @param Payment $paymentData
     * @param int $eventsId
     * @param int $packageId
     * @param string $packageName
     */
    private function saveUserDelegate($paymentData, $eventsId, $packageId, $packageName)
    {
        $delegate = UsersDelegate::firstOrNew(['payment_id' => $paymentData->id]);
        $delegate->users_id = $paymentData->users_id;
        $delegate->events_id = $eventsId;
        $delegate->package_id = $packageId;
        $delegate->package_name = $packageName;
        $delegate->payment_status = 'Paid Off';
        $delegate->save();
    }

    /**
     * Menyiapkan detail item untuk email.
     *
     * @param Payment $paymentData
     * @return array
     */
    private function prepareItemDetails($paymentData)
    {
        return [
            'name' => $paymentData->name,
            'job_title' => $paymentData->job_title,
            'price' => number_format($paymentData->event_price, 0, ',', '.'),
            'paidoff' => false,
            'code_payment' => $paymentData->code_payment,
        ];
    }

    /**
     * Menyiapkan detail pesan WhatsApp.
     *
     * @param Payment $paymentData
     * @return string
     */
    private function prepareWhatsappDetails($paymentData)
    {
        return "
Nama : {$paymentData->name}
Email: {$paymentData->email}
Phone Number: {$paymentData->phone}
Company : {$paymentData->company_name}
Code Access: {$paymentData->code_payment}
Payment Method: {$paymentData->payment_method}
        ";
    }

    /**
     * Mengirim email akses kepada delegate.
     *
     * @param Payment $paymentData
     * @param string $qrCodePath
     */
    private function sendDelegateAccessEmail($paymentData, $qrCodePath)
    {
        $delegateDetail = Events::where('id', $paymentData->events_id)->first();
        if (empty($delegateDetail->id)) {
            return;
        }

        $dateEvents = $this->formatEventDate($delegateDetail->date_start, $delegateDetail->date_end);
        $data = [
            'users_name' => $paymentData->name,
            'company_name' => $paymentData->company_name,
            'email' => $paymentData->email,
            'events_name' => $delegateDetail->name,
            'events_date' => $dateEvents,
            'events_link' => url('events-join/show/' . $delegateDetail->slug),
            'qr_code' => $qrCodePath,
            'pesan1' => 'delegate',
            'pesan' => ''
        ];

        $subject = "E - Ticket {$paymentData->code_payment} - IM25 - {$paymentData->name}";

        // Generate eticket PDF from view
        $pdfEticket = Pdf::loadView('email.ticket', [
            'code_payment' => $paymentData->code_payment,
            'name' => $paymentData->name,
            'company_name' => $paymentData->company_name,
            'email' => $paymentData->email,
            'phone' => $paymentData->phone,
        ]);

        Mail::send('email.approve', $data, function ($message) use ($paymentData, $subject, $pdfEticket) {
            $message->from(env('EMAIL_SENDER'), 'indonesiaminer.com');
            $message->to($paymentData->email);
            $message->subject($subject);
            $message->attachData($pdfEticket->output(), $paymentData->code_payment . '_eticket.pdf', [
                'mime' => 'application/pdf',
            ]);
        });
    }

    /**
     * Mengirim email tanda terima kepada kontak booking.
     *
     * @param Payment $payment
     * @param array $data
     * @param array $itemDetails
     */
    private function sendBookingPaymentReceipt($payment, $data, $itemDetails)
    {
        $booking = BookingModel::find($payment->booking_id);
        $delegateDetail = Events::join('payment', 'payment.events_id', 'events.id')->where('payment.id', $payment->id)->first();

        $emailData = [
            'name' => $booking->name_contact,
            'email' => $booking->email_contact,
            'phone' => $booking->phone_contact,
            'company_name' => $booking->company_contact,
            'item' => $itemDetails,
            'status' => 'Paid Off',
            'total_price' => number_format($data['paid_amount'], 0, ',', '.'),
            'create_date' => date('d, M Y H:i'),
            'code_payment' => $data['external_id'],
            'events_name' => $delegateDetail->events_name,
            'voucher_price' => null,
            'link' => null,
            'payment_method' => $data['payment_method'],
            'vat' => $payment->vat
        ];

        $pdf = Pdf::loadView('email.invoice-new-multiple', $emailData);

        Mail::send('email.invoice-new-multiple', $emailData, function ($message) use ($booking, $data, $pdf) {
            $message->from(env('EMAIL_SENDER'));
            $message->to($booking->email_contact);
            $message->subject('Thank you for payment - INDONESIA MINER 2025');
            $message->attachData($pdf->output(), $data['external_id'] . '_Indonesia_Miner_2025.pdf');
        });
    }

    /**
     * Mengirim notifikasi sukses pembayaran booking melalui WhatsApp.
     *
     * @param array $details
     */
    private function notifyBookingPaymentSuccess($details)
    {
        $message = "
Hai Team,

Success payment
Detail Informasinya:
" . implode(" ", $details) . "

Thank you
Best Regards Bot Indonesia Miner
        ";

        $whatsapp = new WhatsappApi();
        $whatsapp->phone = '120363347094951003';
        $whatsapp->message = $message;
        $whatsapp->WhatsappMessageGroup();
    }

    /**
     * Memproses pembayaran tunggal tanpa booking.
     *
     * @param Payment $payment
     * @param array $data
     */
    private function processSinglePayment($payment, $data)
    {
        // Generate QR Code
        $qrCodePath = $this->generateQRCode($data['external_id']);

        // Update payment status
        $this->updatePaymentStatus($payment, 'Paid Off', [
            'qr_code' => $qrCodePath,
            'payment_method' => $data['payment_method'],
            'trash' => null
        ]);

        // Set approval quota
        $payment->aproval_quota_users = 1;
        $payment->save();

        // Get user payment details
        $user = Payment::join('users', 'users.id', 'payment.users_id')
            ->where('payment.code_payment', $data['external_id'])
            ->first();

        // Prepare WhatsApp notification details
        $whatsappDetails = [];
        $whatsappDetails[] = $this->prepareWhatsappDetails($user);

        // Simpan informasi delegate atau perusahaan
        $this->saveDelegateOrCompany($payment);

        // Notify team via WhatsApp
        $this->notifyBookingPaymentSuccess($whatsappDetails);

        // Kirim email kepada pengguna jika diperlukan
        $this->sendSinglePaymentEmail($payment, $data, $qrCodePath);
    }

    /**
     * Menyimpan informasi delegate atau perusahaan berdasarkan data pembayaran.
     *
     * @param Payment $payment
     */
    private function saveDelegateOrCompany($payment)
    {
        if ($payment->users_id) {
            $delegate = new UsersDelegate();
            $delegate->users_id = $payment->users_id;
            $delegate->events_id = $payment->events_id;
            $delegate->package_id = $payment->package_id;
            $delegate->package_name = $payment->package;
            $delegate->payment_id = $payment->id;
            $delegate->payment_status = $payment->status;
            $delegate->save();
        } elseif ($payment->company_id) {
            $companyDelegate = new UsersCompany();
            $companyDelegate->company_id = $payment->company_id;
            $companyDelegate->events_id = $payment->events_id;
            $companyDelegate->package_id = $payment->package_id;
            $companyDelegate->package_name = $payment->package;
            $companyDelegate->payment_id = $payment->id;
            $companyDelegate->payment_status = $payment->status;
            $companyDelegate->save();
        }
    }

    /**
     * Mengirim email kepada pengguna untuk pembayaran tunggal.
     *
     * @param Payment $payment
     * @param array $data
     * @param string $qrCodePath
     */
    private function sendSinglePaymentEmail($payment, $data, $qrCodePath)
    {
        $delegateDetail = Events::join('payment', 'payment.events_id', 'events.id')
            ->join('users', 'users.id', 'payment.users_id')
            ->select(
                'users.id',
                'events.id as event_id',
                'events.name as events_name',
                'events.date_start',
                'events.date_end',
                'events.slug',
                'users.name',
                'users.job_title',
                'users.email',
                'users.phone',
                'users.company_name',
                'payment.id as payment_id',
                'payment.code_payment',
                'payment.event_price',
                'payment.voucher_price',
                'payment.total_price',
                'payment.status',
                'payment.package',
                'payment.package_id',
                'payment.aproval_quota_users',
                'payment.qr_code',
                'payment.payment_method',
                'payment.vat',
                'users.company_address'
            )
            ->where('payment.id', $payment->id)->first();
        if (empty($delegateDetail->id)) {
            return;
        }

        $dateEvents = $this->formatEventDate($delegateDetail->date_start, $delegateDetail->date_end);
        $itemDetails[] = [
            'name' => $delegateDetail->name,
            'job_title' => $delegateDetail->job_title,
            'price' => number_format($delegateDetail->event_price, 0, ',', '.'),
            'paidoff' => false,
            'code_payment' => $delegateDetail->code_payment,
        ];
        $emailData = [
            "users_name" => $delegateDetail->name,
            "name" => $delegateDetail->name,
            "email" => $delegateDetail->email,
            "create_date" => date('d, M Y H:i'),
            "due_date" => date('d, M Y H:i', strtotime('+1 day')),
            "phone" => $payment->phone,
            "company_name" => $delegateDetail->company_name,
            "address_company" => $delegateDetail->company_address,
            "events_name" => $delegateDetail->events_name,
            "code_payment" => $data['external_id'],
            'item' => $itemDetails,
            "events_date" => $dateEvents,
            "status" => $payment->status,
            "payment_method" => $data['payment_method'],
            "event_price" => number_format($payment->event_price, 0, ',', '.'),
            "voucher_price" => number_format($payment->voucher_price, 0, ',', '.'),
            'vat' => number_format($payment->vat, 0, ',', '.'),
            "total_price" => number_format($payment->total_price, 0, ',', '.'),
            "qr_code" => $qrCodePath,
            "link" => null,
            'pesan1' => 'delegate',
            'pesan' => ''
        ];

        $pdf = Pdf::loadView('email.invoice-new-multiple', $emailData);
        $subject = "E - Ticket {$data['external_id']} - IM25 - {$delegateDetail->name}";

        Mail::send('email.approve', $emailData, function ($message) use ($pdf, $delegateDetail, $payment, $subject) {
            $message->from(env('EMAIL_SENDER'));
            $message->to($delegateDetail->email);
            $message->subject($subject);
            $message->attachData($pdf->output(), $payment->code_payment . '_' . $delegateDetail->email . '.pdf');
        });
    }

    /**
     * Memformat tanggal event untuk ditampilkan.
     *
     * @param string $startDate
     * @param string $endDate
     * @return string
     */
    private function formatEventDate($startDate, $endDate)
    {
        $dateStart = date('F j', strtotime($startDate));
        $dateEnd = date('j, Y', strtotime($endDate));
        $dayStart = date('l', strtotime($startDate));
        $dayEnd = date('l', strtotime($endDate));

        return "{$dateStart} - {$dateEnd} ({$dayStart} - {$dayEnd})";
    }
}
