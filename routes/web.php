<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.public.home');
})->name('home');

Route::get('about', function () {
    return view('pages.public.about');
})->name('about');

Route::get('services', function () {
    return view('pages.public.services');
})->name('services');

Route::get('contact', function () {
    return view('pages.public.contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // تسجيل الدخول
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    // التسجيل
    Route::get('register', [RegisterController::class, 'show'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    // إعادة تعيين كلمة المرور
    Route::get('password/forgot', [ForgotPasswordController::class, 'show'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'show'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'store'])->name('password.update');
});

// تسجيل الخروج
Route::post('logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Protected Routes - يتطلب تسجيل دخول
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Users Management - صلاحيات محددة
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin|staff')->group(function () {
        Route::get('users', [UserController::class, 'index'])
            ->middleware('permission:view users')
            ->name('users.index');

        Route::get('users/create', [UserController::class, 'create'])
            ->middleware('permission:create users')
            ->name('users.create');

        Route::post('users', [UserController::class, 'store'])
            ->middleware('permission:create users')
            ->name('users.store');

        Route::get('users/{user}/edit', [UserController::class, 'edit'])
            ->middleware('permission:edit users')
            ->name('users.edit');

        Route::patch('users/{user}', [UserController::class, 'update'])
            ->middleware('permission:edit users')
            ->name('users.update');

        Route::delete('users/{user}', [UserController::class, 'destroy'])
            ->middleware('permission:delete users')
            ->name('users.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Roles Management - فقط Admin
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])
            ->middleware('permission:manage roles')
            ->name('roles.index');

        Route::get('roles/create', [RoleController::class, 'create'])
            ->middleware('permission:manage roles')
            ->name('roles.create');

        Route::post('roles', [RoleController::class, 'store'])
            ->middleware('permission:manage roles')
            ->name('roles.store');

        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])
            ->middleware('permission:manage roles')
            ->name('roles.edit');

        Route::patch('roles/{role}', [RoleController::class, 'update'])
            ->middleware('permission:manage roles')
            ->name('roles.update');

        Route::delete('roles/{role}', [RoleController::class, 'destroy'])
            ->middleware('permission:manage roles')
            ->name('roles.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Memberships Management - متاح للجميع مع صلاحيات محددة
    |--------------------------------------------------------------------------
    */
    Route::get('memberships', [MembershipController::class, 'index'])
        ->middleware('permission:view memberships')
        ->name('memberships.index');

    Route::get('memberships/create', [MembershipController::class, 'create'])
        ->name('memberships.create');

    Route::post('memberships', [MembershipController::class, 'store'])
        ->middleware('permission:create memberships')
        ->name('memberships.store');

    Route::get('memberships/{membership}', [MembershipController::class, 'show'])
        ->middleware('permission:view memberships')
        ->name('memberships.show');

    Route::post('memberships/{membership}/approve', [MembershipController::class, 'approve'])
        ->middleware('permission:approve memberships')
        ->name('memberships.approve');

    Route::post('memberships/{membership}/reject', [MembershipController::class, 'reject'])
        ->middleware('permission:approve memberships')
        ->name('memberships.reject');

    Route::delete('memberships/{membership}', [MembershipController::class, 'destroy'])
        ->middleware('permission:delete memberships')
        ->name('memberships.destroy');

    /*
    |--------------------------------------------------------------------------
    | Reports Management
    |--------------------------------------------------------------------------
    */
    Route::get('reports', [ReportController::class, 'index'])
        ->middleware('permission:view reports')
        ->name('reports.index');

    /*
    |--------------------------------------------------------------------------
    | Profile Management
    |--------------------------------------------------------------------------
    */
    Route::get('profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    /*
    |--------------------------------------------------------------------------
    | Settings Management
    |--------------------------------------------------------------------------
    */
    Route::get('settings', [SettingsController::class, 'index'])
        ->name('settings.index');

    Route::patch('settings', [SettingsController::class, 'update'])
        ->name('settings.update');
});
