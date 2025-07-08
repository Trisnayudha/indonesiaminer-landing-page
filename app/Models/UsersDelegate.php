<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersDelegate extends Model
{
    use HasFactory;

    protected $table = 'users_delegate'; // Sesuaikan dengan nama tabel Anda jika berbeda

    protected $fillable = [
        'users_id',
        'events_id',
        'date_day1',
        'date_day2',
        'date_day3',
        'image',
        'created_at',
        'updated_at',
        'payment_id'
    ];
}
