<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// ─── Locale Switch ─────────────────────────────────────────
Route::get('locale/{locale}', function (string $locale) {
    if (in_array($locale, ['km', 'en'], true)) {
        session(['locale' => $locale]);
    }
    return redirect()->back()->withHeaders(['Cache-Control' => 'no-store']);
})->name('locale.switch');

// ─── Frontend ──────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/coverage', [HomeController::class, 'coverage'])->name('coverage');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/kpi', [HomeController::class, 'kpi'])->name('kpi');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/portal', [HomeController::class, 'portal'])->name('portal');
Route::get('/career', [HomeController::class, 'career'])->name('career');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/service-request', [ContactController::class, 'serviceRequest'])->name('service.request');
Route::post('/career/apply', [HomeController::class, 'careerApply'])->name('career.apply');

// ─── Admin Auth ────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [Admin\AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [Admin\AuthController::class, 'logout'])->name('logout');

    // ─── Protected Admin Routes ────────────────────────────
    Route::middleware('admin')->group(function () {
        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('services', Admin\ServiceController::class);
        Route::resource('slugs', Admin\SlugController::class);
        Route::resource('service-types', Admin\ServiceTypeController::class);
        Route::resource('corporate-subscribers', Admin\CorporateSubscriberController::class);
        Route::resource('careers', Admin\CareerController::class);
        Route::post('translate', [Admin\TranslateController::class, 'translate'])->name('translate');
        Route::get('career-applications', [Admin\CareerApplicationController::class, 'index'])->name('career-applications.index');
        Route::get('career-applications/{careerApplication}', [Admin\CareerApplicationController::class, 'show'])->name('career-applications.show');
        Route::patch('career-applications/{careerApplication}/status', [Admin\CareerApplicationController::class, 'updateStatus'])->name('career-applications.status');
        Route::delete('career-applications/{careerApplication}', [Admin\CareerApplicationController::class, 'destroy'])->name('career-applications.destroy');
        Route::resource('branches', Admin\BranchController::class);
        Route::resource('teams', Admin\TeamController::class);

        Route::get('service-requests', [Admin\ServiceRequestController::class, 'index'])->name('service-requests.index');
        Route::get('service-requests/{serviceRequest}', [Admin\ServiceRequestController::class, 'show'])->name('service-requests.show');
        Route::patch('service-requests/{serviceRequest}/status', [Admin\ServiceRequestController::class, 'updateStatus'])->name('service-requests.status');
        Route::delete('service-requests/{serviceRequest}', [Admin\ServiceRequestController::class, 'destroy'])->name('service-requests.destroy');

        Route::get('contact-messages', [Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contactMessage}', [Admin\ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::delete('contact-messages/{contactMessage}', [Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [Admin\SettingController::class, 'update'])->name('settings.update');

        Route::resource('users', Admin\UserController::class);
        Route::resource('roles', Admin\RoleController::class);
        Route::resource('permissions', Admin\PermissionController::class)->except(['show']);

        Route::get('activity-logs', [Admin\ActivityLogController::class, 'index'])->name('activity-logs.index');
        Route::delete('activity-logs/clear', [Admin\ActivityLogController::class, 'clear'])->name('activity-logs.clear');
    });
});
