<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'subscription_id',
        'name',
        'company',
        'job_title',
        'phone',
        'traffic_sources',
        'verticals',
    ];
}
