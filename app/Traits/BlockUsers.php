<?php

namespace App\Traits;

use App\Repositories\UsersLog;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

trait BlockUsers
{
    public static function blockEventUsers($data)
    {
        $validator = Validator::make($data, [
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (str_ends_with($value, '@dassaultsystemes.com') || str_ends_with($value, '@3ds.com' || str_ends_with($value, '@arnocindonesia.com'))) {
                        $fail('Registrasi dari Dassault System tidak diperbolehkan.');
                    }
                },
            ],
            'company_name' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (stripos($value, 'dassault') !== false || stripos($value, '3ds') !== false || stripos($value, 'dassault system') !== false || stripos($value, 'arnoc')) {
                        $fail('Registrasi dari Dassault System tidak diperbolehkan.');
                    }
                },
            ],

        ]);

        if ($validator->fails()) {
            abort(404, 'SYSTEM ERROR');
        }

        // Lanjutkan proses pendaftaran jika validasi berhasil
    }
}
