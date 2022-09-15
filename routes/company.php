<?php

use App\Http\Controllers\Company\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Company\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Company\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Company\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Company\Auth\NewPasswordController;
use App\Http\Controllers\Company\Auth\PasswordResetLinkController;
use App\Http\Controllers\Company\Auth\VerifyEmailController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\JobsController;
use App\Http\Controllers\Company\ApplicationManageController;
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
Route::get('/dashboard', function () {
    return view('company.dashboard');
})->middleware(['auth:companies'])->name('dashboard');

Route::resource('information', CompanyController::class)
->middleware('auth:companies')
->except(['index', 'create', 'store', 'destroy']);

Route::resource('jobs', JobsController::class)
->middleware('auth:companies')
->except(['show']);

Route::prefix('applications')->name('applications.')->middleware('auth:companies')->group(function() {
	Route::get('/index', [ApplicationManageController::class, 'index'])->name('index');
	Route::get('/approve/{application}', [ApplicationManageController::class, 'approve'])->name('approve');
	Route::delete('/destroy/{application}', [ApplicationManageController::class, 'destroy'])->name('destroy');
});

Route::middleware('guest')->group(function () {

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
							->name('password.update');
});

Route::middleware('auth:companies')->group(function () {
	Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
							->name('verification.notice');

	Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
							->middleware(['signed', 'throttle:6,1'])
							->name('verification.verify');

	Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
							->middleware('throttle:6,1')
							->name('verification.send');

	Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
							->name('password.confirm');

	Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

	Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
							->name('logout');
});


