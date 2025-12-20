<?php

// مثال على تكوين Routes مع الصلاحيات والأدوار

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('pages.public.home');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);
});

Route::post('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->middleware('auth')->name('logout');

// Protected Routes - يجب أن يكون المستخدم مسجل دخول
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
        ->name('dashboard');

    // Users Management - يتطلب صلاحية view users
    Route::middleware(['auth', 'role:admin,staff'])->group(function () {
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
            ->name('users.index')
            ->middleware('permission:view users');

        Route::get('users/create', [\App\Http\Controllers\UserController::class, 'create'])
            ->name('users.create')
            ->middleware('permission:create users');

        Route::post('users', [\App\Http\Controllers\UserController::class, 'store'])
            ->middleware('permission:create users');

        Route::get('users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])
            ->name('users.edit')
            ->middleware('permission:edit users');

        Route::patch('users/{user}', [\App\Http\Controllers\UserController::class, 'update'])
            ->middleware('permission:edit users');

        Route::delete('users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])
            ->middleware('permission:delete users');
    });

    // Roles Management - فقط للمديرين
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('roles', [\App\Http\Controllers\RoleController::class, 'index'])
            ->name('roles.index')
            ->middleware('permission:manage roles');

        Route::post('roles', [\App\Http\Controllers\RoleController::class, 'store'])
            ->middleware('permission:manage roles');

        Route::patch('roles/{role}', [\App\Http\Controllers\RoleController::class, 'update'])
            ->middleware('permission:manage roles');

        Route::delete('roles/{role}', [\App\Http\Controllers\RoleController::class, 'destroy'])
            ->middleware('permission:manage roles');
    });

    // Memberships - متاح للجميع حسب الصلاحيات
    Route::middleware(['auth'])->group(function () {
        Route::get('memberships', [\App\Http\Controllers\MembershipController::class, 'index'])
            ->name('memberships.index')
            ->middleware('permission:view memberships');

        Route::get('memberships/create', [\App\Http\Controllers\MembershipController::class, 'create'])
            ->name('memberships.create')
            ->middleware('permission:create memberships');

        Route::post('memberships', [\App\Http\Controllers\MembershipController::class, 'store'])
            ->middleware('permission:create memberships');

        Route::get('memberships/{membership}', [\App\Http\Controllers\MembershipController::class, 'show'])
            ->name('memberships.show')
            ->middleware('permission:view memberships');

        Route::post('memberships/{membership}/approve', [\App\Http\Controllers\MembershipController::class, 'approve'])
            ->middleware('permission:approve memberships');
    });

    // Profile
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| API Routes (مثال)
|--------------------------------------------------------------------------
*/

Route::middleware('api')->group(function () {
    Route::get('/api/users', [\App\Http\Controllers\Api\UserController::class, 'index'])
        ->middleware('auth:api', 'permission:view users');

    Route::get('/api/memberships', [\App\Http\Controllers\Api\MembershipController::class, 'index'])
        ->middleware('auth:api', 'permission:view memberships');
});
