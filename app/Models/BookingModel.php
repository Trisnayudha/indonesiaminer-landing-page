<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'booking_contact';
    protected $fillable = [
        'name_contact',
        'email_contact',
        'phone_contact',
        'job_title_contact',
        'company_name',
        'address',
        'city',
        'company_website',
        'country',
        'portal_code',
        'link'
    ];
}
