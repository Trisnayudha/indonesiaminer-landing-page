<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadCompany(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $imageBase64 = $request->input('image');
        $imageBinary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageBase64));

        $folder = $request->input('folder', 'uploads/images/exhibition');
        $folder = rtrim($folder, '/');
        $filename = uniqid() . '.png';
        $fullPath = $folder . '/' . $filename;

        // Coba deteksi default disk
        $defaultDisk = config('filesystems.default');

        // Simpan dan tangkap hasilnya
        try {
            $result = Storage::put($fullPath, $imageBinary);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal upload',
                'exception' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }

        return response()->json([
            'message' => 'Image uploaded successfully',
            'disk' => $defaultDisk,
            'image' => $fullPath,
            'result' => $result
        ]);
    }
}
