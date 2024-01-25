<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
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

Route::get('/', [LandingController::class, 'index']);

Route::middleware(['guest'])->controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'index')->name('login');
    Route::post('/auth/login', 'login')->name('login');
});

Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Logout
    Route::controller(AuthController::class)->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // Users
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users');
        Route::post('/users', 'store')->name('users');
        Route::get('/users/{id}/edit', 'edit');
        Route::put('/users/{id}/edit', 'update');
    });

    // District
    Route::controller(DistrictController::class)->group(function () {
        Route::get('/district', 'index')->name('district');
        Route::get('/district/create', 'create')->name('districtCreate');
        Route::post('/district', 'store')->name('district');
        Route::get('/district/{id}/edit', 'edit');
        Route::put('/district/{id}/edit', 'update');
        Route::delete('/district', 'destroy')->name('district');
        Route::get('/district/{id}/detail', 'show')->name('detail');
    });
    
    // TPS
    Route::controller(TpsController::class)->group(function () {
        Route::get('/tps', 'index')->name('tps');
        Route::get('/tps/create', 'create')->name('tpsCreate');
        Route::post('/tps', 'store')->name('tps');
        Route::get('/tps/{id}/edit', 'edit');
        Route::put('/tps/{id}/edit', 'update');
        Route::delete('/tps', 'destroy')->name('tps');
        Route::get('/tps/{id}/detail', 'show')->name('detail');
    });

    // Candidate
    Route::controller(CandidateController::class)->group(function () {
        Route::get('/candidate', 'index')->name('candidate');
        Route::get('/candidate/create', 'create')->name('candidateCreate');
        Route::post('/candidate', 'store')->name('candidate');
        Route::get('/candidate/{id}/edit', 'edit');
        Route::put('/candidate/{id}/edit', 'update');
        Route::delete('/candidate', 'destroy')->name('candidate');
        Route::get('/candidate/{id}/detail', 'show')->name('detail');
    });

    // Vote
    Route::controller(VoteController::class)->group(function () {
        Route::get('/vote', 'index')->name('vote');
        Route::post('/vote', 'store')->name('vote');
    });

});
