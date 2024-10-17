<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users'; // Sesuaikan dengan nama tabel Anda jika berbeda

    protected $fillable = [
        'name',
        'email',
        'phone',
        'job_title',
        'job_title_detail',
        'company_name',
        'city',
        'country',
        'post_code',
        'company_web',
        'password',
        'is_register',
        // Tambahkan atribut lain yang diperlukan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Opsional: Tentukan atribut yang perlu dikonversi ke tipe data asli
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
