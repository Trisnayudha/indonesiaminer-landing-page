<?php

use App\Helpers\WhatsappApi;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
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
Route::get('/sponsors', [SponsorController::class, 'index']);
Route::get('/speakers', [SpeakerController::class, 'index']);
Route::post('/detail-modal-search', [SponsorController::class, 'postDetailModalSearch']);
Route::post('contact/interest', [ContactController::class, 'postInterest']);
Route::post('contact/exhibition', [ContactController::class, 'postExhibition']);
Route::post('contact/sponsorship', [ContactController::class, 'postSponsorship']);
Route::post('contact/news-subcribe', [ContactController::class, 'postNewsSubcribe']);

Route::get('/exhibition', [ExhibitionController::class, 'index']);
Route::get('/program', [ProgramController::class, 'index']);
Route::get('/calendar/schedule', [ProgramController::class, 'getListCalendarSchedule']);
Route::get('/calendar/workshop', [ProgramController::class, 'getListCalendarWorkshop']);
Route::get('/calendar/ministage', [ProgramController::class, 'getListCalendarMinistage']);
Route::get('/schedule', [ProgramController::class, 'getListSchedule']);
Route::get('/workshop', [ProgramController::class, 'getListWorkshop']);
Route::get('/ministage', [ProgramController::class, 'getListMinistage']);

Route::get('/test', function () {
    return view('test');
});
