<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// in app/Models/News.php
class News extends Model
{
    protected $casts = [
        'date_news' => 'datetime',
    ];
}
