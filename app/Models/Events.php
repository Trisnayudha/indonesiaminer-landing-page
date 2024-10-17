<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events'; // Sesuaikan dengan nama tabel Anda jika berbeda

    protected $fillable = [
        'name',
        'slug',
        'description',
        'start_date',
        'end_date',
        'location',
        // Tambahkan atribut lain yang diperlukan
    ];
}
