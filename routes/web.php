<?php

use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Candidate\BookmarkController;
use App\Http\Controllers\Candidate\CandidateAccountController;
use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Candidate\CandidateEducationController;
use App\Http\Controllers\Candidate\CandidateExperienceController;
use App\Http\Controllers\Candidate\CandidateProfileController;
use App\Http\Controllers\Company\AjaxRequestController;
use App\Http\Controllers\Company\CompanyAccountController;
use App\Http\Controllers\Company\CompanyDashboardController;
use App\Http\Controllers\Company\CompanyJobController;
use App\Http\Controllers\Company\CompanyProfileController;
use App\Http\Controllers\Company\JobAppliedController;
use App\Http\Controllers\Company\PlanDetailsController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\AllJobPageController;
use App\Http\Controllers\Frontend\BlogIndexController;
use App\Http\Controllers\Frontend\CandidatePageController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CompanyPageController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\JobPostController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\PricingPageController;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('page/{slug}', [FrontendController::class, 'customPage'])->name('custom.page');

/* Company Routs */
Route::get('/companies', [CompanyPageController::class, 'allCompany'])->name('companies');
Route::get('/companies/{slug}', [CompanyPageController::class, 'companyPage'])->name('companies.page');

/* Candidate Routs */
Route::get('/candidates', [CandidatePageController::class, 'allCandidates'])->name('candidates');
Route::get('/candidates/{slug}', [CandidatePageController::class, 'candidateInfo'])->name('candidates.page');

/* Pricing Routs */
Route::get('/pricing', PricingPageController::class)->name('pricing');
Route::get('/checkout/{plan_id}', CheckoutController::class)->name('checkout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* All Jobs Routs */
Route::get('/all-jobs', [AllJobPageController::class, 'index'])->name('all.jobs');
Route::get('/all-jobs/{slug}', [AllJobPageController::class, 'jobDetail'])->name('all.jobs.detail');

/* All Jobs post Routs */
Route::post('/post-job/{id}', [JobPostController::class, 'jobPost'])->name('post.job');

/* job bookmarked route */
Route::get('/bookmark/{id}', [BookmarkController::class, 'bookmarked'])->name('bookmark');

/* Frontend Blog route */
Route::get('/all-blogs', [BlogIndexController::class, 'index'])->name('all-blogs');
Route::get('/blogs/{slug}', [BlogIndexController::class, 'blogDetail'])->name('blog-detail');

/* Frontend About Us route */
Route::get('/about', [AboutUsController::class, 'index'])->name('about-us');

/* Contact Us route */
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactUsController::class, 'mail'])->name('contact-us');

/* subscrib route */
Route::post('/subscrib', [NewsletterController::class, 'subscrib'])->name('subscrib');

require __DIR__ . '/auth.php';

/* candidate dashboard */

Route::group(['middleware' => ['auth', 'verified', 'user.role:candidate'], 'prefix' => 'candidate', 'as' => 'candidate.'], function () {

    Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('dashboard');
    Route::get('/applied-job', [CandidateDashboardController::class, 'appliedJob'])->name('applied-job');
    Route::get('/bookmark-job', [CandidateDashboardController::class, 'bookmarkedJob'])->name('bookmark-job');
    Route::get('/bookmark-remove/{id}', [BookmarkController::class, 'bookmarkDelete'])->name('bookmark-remove');
    Route::get('/profile', [CandidateProfileController::class, 'index'])->name('profile');
    Route::post('/profile-update', [CandidateProfileController::class, 'store'])->name('profile-update');
    Route::post('/profile-details', [CandidateProfileController::class, 'profileInfo'])->name('profile-details');
    Route::post('/account-settings', [CandidateProfileController::class, 'accountSetting'])->name('account-settings');
    Route::resource('/add-experience', CandidateExperienceController::class);
    Route::resource('/add-education', CandidateEducationController::class);
    Route::post('/account-email', [CandidateAccountController::class, 'accountEmail'])->name('account-email');
    Route::post('/account-password', [CandidateAccountController::class, 'accountPassword'])->name('account-password');
});


/** Company AJAX Request Route */
Route::get('get-states/{country_id}', [AjaxRequestController::class, 'stateRequest'])->name('get-states');
Route::get('get-cities/{state_id}', [AjaxRequestController::class, 'citysRequest'])->name('get-cities');

/* company dashboard */
Route::group(['middleware' => ['auth', 'verified', 'user.role:company'], 'prefix' => 'company', 'as' => 'company.'], function () {

    /** Dashboard */
    Route::get('/dashboard', [CompanyDashboardController::class, 'index'])->name('dashboard');

    /** Profile */
    Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
    Route::post('/profile/company-info', [CompanyProfileController::class, 'updateCompanyInfo'])->name('profile.info');
    Route::post('/profile/founding-info', [CompanyProfileController::class, 'foundingInfo'])->name('profile.founding.info');
    Route::post('/account-email', [CompanyAccountController::class, 'accountEmail'])->name('account-email');
    Route::post('/account-password', [CompanyAccountController::class, 'accountPassword'])->name('account-password');

    /** payment route */
    Route::get('payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment/error', [PaymentController::class, 'paymentError'])->name('payment.error');

    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancle', [PaymentController::class, 'paypalCancle'])->name('paypal.cancle');

    Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
    Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

    /** Plans details Routs */
    Route::get('orders', [PlanDetailsController::class, 'planIndex'])->name('plans.index');
    Route::get('orders/{id}', [PlanDetailsController::class, 'showPlan'])->name('plans.show');
    Route::get('orders/invoice/{id}', [PlanDetailsController::class, 'invoice'])->name('plans.invoice');

    /** job post Routs */
    Route::resource('jobs-post', CompanyJobController::class);

    /** job Applied candidates Routs */
    Route::get('/applied-candidates/{id}', [JobAppliedController::class, 'index'])->name('applied-candidates');
});
