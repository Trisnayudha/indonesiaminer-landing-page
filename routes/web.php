<?php

use App\Helpers\WhatsappApi;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/ticket', [TicketController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'payment']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/detail/{slug}', [NewsController::class, 'detail']);

Route::get('/test',function(){
    return view('test');
});
