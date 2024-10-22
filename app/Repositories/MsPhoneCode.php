<?php

namespace App\Repositories;

use App\Models\MsPhoneCode as ModelsMsPhoneCode;
use Illuminate\Support\Facades\DB;

class MsPhoneCode extends ModelsMsPhoneCode
{
    public static function showAll()
    {
        return DB::table('ms_phone_code')
            ->select('ms_phone_code.id', 'ms_phone_code.code')
            ->orderby('ms_phone_code.code', 'asc')
            ->get();
    }

    public  static function detail($code)
    {
        return DB::table('ms_phone_code')
            ->where('ms_country_id', $code)->first();
    }
}
