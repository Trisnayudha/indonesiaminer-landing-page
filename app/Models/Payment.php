<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';

    protected $fillable = [
        'type',
        'code_payment',
        'users_id',
        'events_id',
        'package_id',
        'payment_method',
        'event_price',
        'event_price_dollar',
        'status',
        'total_price',
        'total_price_dollar',
        'qr_code',
        'aproval_quota_users',
        'booking_id',
        'link_reference',
        'rate_idr'
    ];

    public static function arrayCode()
    {
        return DB::table('payment')
            ->select('payment.code_payment')
            ->inRandomOrder()
            ->limit(2000)
            ->pluck('payment.code_payment')
            ->toArray();
    }
}
