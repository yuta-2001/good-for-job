<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\JobsController;
use App\Http\Controllers\User\ChatController;

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
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

Route::middleware(['auth:users'])->group(function() {
    Route::prefix('jobs')->name('jobs.')->group(function () {
        Route::get('/', [JobsController::class, 'index'])->name('index');
        Route::get('/{job}', [JobsController::class, 'show'])->name('show');
        Route::get('/{job}/apply', [JobsController::class, 'apply'])->name('apply');
    });
    Route::prefix('companies')->name('companies.')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::get('/{company}', [CompanyController::class, 'show'])->name('show');
    });
    Route::prefix('chat')->name('chat.')->group(function() {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        Route::get('/show/{entry}', [ChatController::class, 'show'])->name('show');
        Route::post('/send/{entry}', [ChatController::class, 'send'])->name('send');
    });
});

require __DIR__.'/auth.php';

//都道府県選択時の非同期処理
Route::post('/fetch/address', [AjaxController::class, 'city']);