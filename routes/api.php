<?php

use App\Http\Controllers\API\UploadController;
use App\Http\Controllers\Callback\XenditCallbackController;
use App\Http\Controllers\SpeakerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('callback/xendit', [XenditCallbackController::class, 'postInvoiceNew']);
Route::post('/upload-image/company', [UploadController::class, 'uploadCompany']);

Route::get('/fetch-speakers', [SpeakerController::class, 'listOfSpeaker']);
