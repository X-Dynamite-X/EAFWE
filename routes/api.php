<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\ApiServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Public API Routes
|--------------------------------------------------------------------------
*/

// Membership verification (public)
Route::get('membership/{token}', [MemberController::class, 'verifyToken'])
    ->name('api.membership.verify');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->name('api.auth.')->group(function () {
    // Public authentication endpoints
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    // Protected authentication endpoints
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('user', [AuthController::class, 'user'])->name('user');
    });
});

/*
|--------------------------------------------------------------------------
| Protected API Routes - Require Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->prefix('member')->name('api.member.')->group(function () {
    // Profile endpoints
    Route::get('profile', [MemberController::class, 'getProfile'])->name('profile');
    Route::put('profile', [MemberController::class, 'updateProfile'])->name('profile.update');

    // Dashboard
    Route::get('dashboard', [MemberController::class, 'getDashboard'])->name('dashboard');

    // Membership card endpoints
    Route::prefix('card')->name('card.')->group(function () {
        Route::get('/', [MemberController::class, 'getCard'])->name('index');
        Route::get('qr', [MemberController::class, 'getQrCode'])->name('qr');
        Route::post('reissue', [MemberController::class, 'reissueCard'])->name('reissue');
        Route::get('download', [MemberController::class, 'downloadCard'])->name('download');
    });

    // Membership request endpoint
    Route::prefix('membership')->name('membership.')->group(function () {
        Route::post('request', [MemberController::class, 'submitMembershipRequest'])->name('request');
    });

    // Member Services
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('training', [ApiServiceController::class, 'training'])->name('training');
        Route::get('entrepreneurship', [ApiServiceController::class, 'entrepreneurship'])->name('entrepreneurship');
        Route::get('participation', [ApiServiceController::class, 'participationOpportunities'])->name('participation');
        Route::get('marketing', [ApiServiceController::class, 'marketing'])->name('marketing');
        Route::get('files', [ApiServiceController::class, 'files'])->name('files');
        Route::get('communication', [ApiServiceController::class, 'communication'])->name('communication');
        Route::get('portal', [ApiServiceController::class, 'portalOpportunities'])->name('portal');
    });
});
