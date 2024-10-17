<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInvoice extends Model
{
    use HasFactory;
    protected $table = 'payment_invoice'; // Sesuaikan dengan nama tabel Anda jika berbeda

    protected $fillable = [
        'payment_code',
        'payment_id',
        'users_id',
        'transaction_id',
        'status',
        'amount',          // Pastikan nama kolom ini sesuai di database Anda
        'payer_email',
        'description',
        'expiry_date',
        'invoice_url',
        'currency',
        // Tambahkan atribut lain jika diperlukan
    ];
}
