<?php

use App\Http\Controllers\AuthorbookController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

require __DIR__ . '/auth.php';

Route::get('/attach', [AuthorbookController::class, 'index'])->name('book');
Route::get('/show/{id}', [AuthorbookController::class, 'show']);
Route::get('/get-data', [AuthorbookController::class, 'getdata']);
Route::get('/review-form/{id}', [AuthorbookController::class, 'createreview'])->name('review.create');
Route::post('/review', [AuthorbookController::class, 'reviewstore'])->name('review');
// Route::post('/logout', [AuthorbookController::class, 'logout']);

// Route::get('email-test', function(){
//     $details['email'] = 'nriya5892@gmail.com';
//     $details['email'] = 'Akshaykumarwins@gmail.com';
//     dispatch(new App\Jobs\SendEmailJob($details));
//     dd('done');
//     });


