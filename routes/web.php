<?php

use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
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

/* Home Routs */

Route::get('/', [FrontendController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/* candidate dashboard */

Route::group(['middleware' => ['auth', 'verified', 'user.role:candidate'], 'prefix' => 'candidate', 'as' => 'candidate.'], function () {

    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
});


/* company dashboard */

Route::group(['middleware' => ['auth', 'verified', 'user.role:company'], 'prefix' => 'company', 'as' => 'company.'], function () {

    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');
});
