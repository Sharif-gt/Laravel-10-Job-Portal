<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CustomPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\IndustryTypeController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LearnMoreController;
use App\Http\Controllers\Admin\LocationAjaxController;
use App\Http\Controllers\Admin\MenuBulderController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\OrderDetailsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    /** admin dashboard */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /** Industry Routs */
    Route::resource('industry-type', IndustryTypeController::class);

    /** Organization Type Routs */
    Route::resource('organization-type', OrganizationTypeController::class);

    /** Country Routs */
    Route::resource('country', CountryController::class);

    /** States Routs */
    Route::resource('state', StateController::class);

    /** City Routs */
    Route::resource('cities', CityController::class);
    /** City AJAX Routs */
    Route::get('get-states/{country_id}', [LocationAjaxController::class, 'locationAjax'])->name('get-states');

    /** Languages Routs */
    Route::resource('languages', LanguageController::class);

    /** Profession Routs */
    Route::resource('professions', ProfessionController::class);

    /** Skills Routs */
    Route::resource('skills', SkillController::class);

    /** price plan Routs */
    Route::resource('plans', PriceController::class);

    /** Blogs Routs */
    Route::resource('blogs', BlogController::class);

    /** Hero Section Routs */
    Route::resource('hero', HeroController::class);

    /** Why Choose Us Section Routs */
    Route::resource('why-choose-us', WhyChooseUsController::class);

    /** Learn more Section Routs */
    Route::resource('learn-more', LearnMoreController::class);

    /** About us Section Routs */
    Route::resource('about', AboutController::class);

    /** About us Section Routs */
    Route::resource('custom-page', CustomPageController::class);

    /** order details Routs */
    Route::get('orders', [OrderDetailsController::class, 'orderIndex'])->name('orders.index');
    Route::get('orders/{id}', [OrderDetailsController::class, 'showOrder'])->name('orders.show');
    Route::get('orders/invoice/{id}', [OrderDetailsController::class, 'invoice'])->name('orders.invoice');

    /** Job category Routs */
    Route::resource('job-category', JobCategoryController::class);

    /** Job post Routs */
    Route::post('job-status/{id}', [JobController::class, 'jobStatus'])->name('job-status.update');
    Route::resource('jobs', JobController::class);

    /** subscriber Routs */
    Route::get('all-subscribers', [SubscriberController::class, 'index'])->name('subscribers');
    Route::post('send-email', [SubscriberController::class, 'sendMail'])->name('send-mail');
    Route::delete('all-subscribers/{id}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

    /** payment setting Routs */
    Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
    Route::post('payment-setting/store', [PaymentSettingController::class, 'store'])->name('payment-setting.store');
    Route::post('stripe-setting/store', [PaymentSettingController::class, 'stripeStore'])->name('stripe-setting.store');

    /** site setting Routs */
    Route::get('site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
    Route::post('site-settings/store', [SiteSettingController::class, 'store'])->name('site-settings.store');

    /** Menu Builder Routs */
    Route::get('menu-builder', [MenuBulderController::class, 'index'])->name('menu-builder');

    /** Hero Section Routs */
    // Route::get('hero-section', [HeroSectionController::class, 'index'])->name('hero-section.index');
    // Route::post('hero-section/update/1', [HeroSectionController::class, 'update'])->name('hero-section.update');

    // Route::get('verify-email', EmailVerificationPromptController::class)
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //     ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');


});
