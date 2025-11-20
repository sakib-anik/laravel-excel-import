<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Conference\ConferenceController;

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

Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/galleries', [HomeController::class,'galleries'])->name('galleries');
Route::get('/galleries/{type}', [HomeController::class,'galleriesShowByType'])->name('galleries.type');
Route::get('/albums/{id}', [HomeController::class,'albums'])->name('albums');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// SSLCOMMERZ Start
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/checkout2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->name('payViaAjax');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Conference Section Starts Here
Route::get('/conference-checkout', [ConferenceController::class, 'index'])->name('conference-checkout');
// Conference Section Ends Here

require __DIR__.'/auth.php';
