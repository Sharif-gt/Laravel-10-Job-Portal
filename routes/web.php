<?php

use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Candidate\CandidateExperienceController;
use App\Http\Controllers\Candidate\CandidateProfileController;
use App\Http\Controllers\Company\AjaxRequestController;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\CompanyProfileController;
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
    Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile');
    Route::post('/profile-update', [CandidateProfileController::class, 'store'])->name('profile-update');
    Route::post('/profile-details', [CandidateProfileController::class, 'profileInfo'])->name('profile-details');
    Route::resource('/add-experience', CandidateExperienceController::class);
});


/* company dashboard */
/** Company AJAX Request Route */
Route::get('get-states/{country_id}', [AjaxRequestController::class, 'stateRequest'])->name('get-states');
Route::get('get-cities/{state_id}', [AjaxRequestController::class, 'citysRequest'])->name('get-cities');

Route::group(['middleware' => ['auth', 'verified', 'user.role:company'], 'prefix' => 'company', 'as' => 'company.'], function () {

    /** Dashboard */
    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');

    /** Profile */
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
    Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.info');
    Route::post('/profile/founding-info', [CompanyProfileController::class, 'foundingInfo'])->name('profile.founding.info');
});
