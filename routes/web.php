<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SendGridController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Auth;


Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('home', [EvenimentController::class, 'home']); //afisare lista sarcini pe pagina de start
    Route::resource('tasks', EvenimentController::class); // ruta de resurse va genera CRUD URI
});
Route::group(['middleware' =>'auth'], function() {
    Route::get('/speakers', [SpeakerController::class, 'index']);
    Route::resource('speakers', SpeakerController::class);
});

Route::get('/', [EvenimentController::class,'home']);; //afisare pagina de start
Route::get('cart', [EvenimentController::class,'cart']); //cos
Route::get('add-tocart/{id}', [EvenimentController::class,'addToCart']);//adaug in cos
Route::patch('update-cart', [EvenimentController::class,'update']); //modific cos
Route::delete('remove-from-cart', [EvenimentController::class,'remove']);//sterg din cos
//se acceseaza metoda update din EvenimentController pentru modificare respective remove pentru ștergere
Route::get('/stripe-payment', [StripeController::class, 'checkout']);
Route::get('/event/{id}/sponsors-partners', [EvenimentController::class, 'showSponsorsPartners']);
Route::get('/event/{id}', [SendGridController::class, 'sendInvitations']);

Route::get('/contact', [ContactController::class,'create']);
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/control', [AdminController::class,'usersList']);

Route::get('event/{id}/agenda', [EvenimentController::class,'showAgenda']);
Route::get('/event/{id}/speakers', [EvenimentController::class,'showSpeakers']);


Route::group(['middleware' => 'auth'], function () {
    Route::resource('events.agendas', AgendaController::class);

    Route::get('/events/{event}/agendas/{agenda}/speakers', [SpeakerController::class, 'index']);
    Route::get('/events/{event}/agendas/{agenda}/speakers/create', [SpeakerController::class, 'create']);
    Route::post('/events/{event}/agendas/{agenda}/speakers', [SpeakerController::class, 'store']);
    Route::get('/events/{event}/agendas/{agenda}/speakers/{speaker}/edit', [SpeakerController::class, 'edit']);
    Route::put('/events/{event}/agendas/{agenda}/speakers/{speaker}', [SpeakerController::class, 'update']);
    Route::delete('/events/{event}/agendas/{agenda}/speakers/{speaker}', [SpeakerController::class, 'destroy']);

    Route::get('/events/{event}/agendas/{agenda}/speakers', [SpeakerController::class, 'index'])->name('events.agendas.speakers.index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('events/{id}', [EventController::class, 'show'])->name('events.show');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::post('partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('partners/{id}/edit', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::put('partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
    Route::delete('partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');
    Route::get('partners/{id}', [PartnerController::class, 'show'])->name('partners.show');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/events/{event}/sponsors', [SponsorController::class, 'index'])->name('events.sponsors');
    Route::get('/events/{event}/sponsors/create', [SponsorController::class, 'create'])->name('events.sponsors.create');
    Route::post('/events/{event}/sponsors', [SponsorController::class, 'store'])->name('events.sponsors.store');
    Route::get('/events/{event}/sponsors/{sponsor}/edit', [SponsorController::class, 'edit'])->name('events.sponsors.edit');
    Route::put('/events/{event}/sponsors/{sponsor}', [SponsorController::class, 'update'])->name('events.sponsors.update');
    Route::delete('/events/{event}/sponsors/{sponsor}', [SponsorController::class, 'destroy'])->name('events.sponsors.destroy');
    
});

