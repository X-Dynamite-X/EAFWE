<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntrepreneurshipProgramController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MarketingResourceController;
use App\Http\Controllers\MemberCardController;
use App\Http\Controllers\MemberFileController;
use App\Http\Controllers\MemberServiceController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParticipationOpportunityController;
use App\Http\Controllers\PortalOpportunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TrainingProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Language Switcher
Route::get('lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::get('/', function () {
    return view('pages.public.home');
})->name('home');

Route::get('contact', function () {
    return view('pages.public.contact');
})->name('contact');

Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', function () {
        return view('pages.public.about');
    })->name('index');
    Route::get('board', [PublicController::class, 'board'])->name('board');
    Route::get('history', [PublicController::class, 'history'])->name('history');
});

Route::get('programs', [PublicController::class, 'programs'])->name('programs.index');
Route::get('entrepreneurship-programs/{entrepreneurship_program}', [PublicController::class, 'EntrepreneurshipProgramShow'])->name('programs.entrepreneurship.show');
Route::get('training-programs/{training_program}', [PublicController::class, 'TrainingProgramShow'])->name('programs.training.show');

Route::get('events', [EventController::class, 'index'])->name('events.index');

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('{slug}', [NewsController::class, 'show'])->name('show');
});

Route::prefix('media')->name('media.')->group(function () {
    Route::get('press', [NewsController::class, 'press'])->name('press');
    Route::get('coverage', [NewsController::class, 'coverage'])->name('coverage');
});

Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::get('photos', [PublicController::class, 'photos'])->name('photos');
    Route::get('videos', [PublicController::class, 'videos'])->name('videos');
});

Route::get('faq', [PublicController::class, 'faq'])->name('faq');

/*
|--------------------------------------------------------------------------
| Member Card Verification (Public)
|--------------------------------------------------------------------------
*/
Route::get('verify/membership/{cardToken}', [MemberCardController::class, 'verify'])
    ->name('member-card.verify');

Route::get('api/membership/{cardToken}', [MemberCardController::class, 'getData'])
    ->name('member-card.api');

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
    | Member Services Routes - للوصول لصفحات الأعضاء
    |--------------------------------------------------------------------------
    */
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('services/entrepreneurship', [MemberServiceController::class, 'entrepreneurship'])->name('services.entrepreneurship');
        Route::get('services/training', [MemberServiceController::class, 'training'])->name('services.training');
        Route::get('services/files', [MemberServiceController::class, 'files'])->name('files');
        Route::get('services/communication', [MemberServiceController::class, 'communication'])->name('communication');
        Route::get('services/marketing', [MemberServiceController::class, 'marketing'])->name('services.marketing');
    });

    // Training Programs - مع صلاحيات الإدارة
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::prefix('training')->name('training.')->group(function () {
            Route::get('', action: [TrainingProgramController::class, 'index'])->name('index');
            Route::get('manage', [TrainingProgramController::class, 'manage'])
                ->middleware('permission:manage training programs')
                ->name('manage');
            Route::get('create', [TrainingProgramController::class, 'create'])
                ->middleware('permission:manage training programs')
                ->name('create');
            Route::post('', [TrainingProgramController::class, 'store'])
                ->middleware('permission:manage training programs')
                ->name('store');
            Route::get('{program}', [TrainingProgramController::class, 'show'])->name('show');
            Route::get('{program}/edit', [TrainingProgramController::class, 'edit'])
                ->middleware('permission:manage training programs')
                ->name('edit');
            Route::patch('{program}', [TrainingProgramController::class, 'update'])
                ->middleware('permission:manage training programs')
                ->name('update');
            Route::delete('{program}', [TrainingProgramController::class, 'destroy'])
                ->middleware('permission:manage training programs')
                ->name('destroy');
        });

        // Entrepreneurship Programs
        Route::prefix('entrepreneurship')->name('entrepreneurship.')->group(function () {
            Route::get('', [EntrepreneurshipProgramController::class, 'index'])->name('index');
            Route::get('manage', [EntrepreneurshipProgramController::class, 'manage'])
                ->middleware('permission:manage entrepreneurship programs')
                ->name('manage');
            Route::get('create', [EntrepreneurshipProgramController::class, 'create'])
                ->middleware('permission:manage entrepreneurship programs')
                ->name('create');
            Route::post('', [EntrepreneurshipProgramController::class, 'store'])
                ->middleware('permission:manage entrepreneurship programs')
                ->name('store');
            Route::get('{program}', [EntrepreneurshipProgramController::class, 'show'])->name('show');
            Route::get('{program}/edit', [EntrepreneurshipProgramController::class, 'edit'])
                ->middleware('permission:manage entrepreneurship programs')
                ->name('edit');
            Route::patch('{program}', [EntrepreneurshipProgramController::class, 'update'])
                ->middleware('permission:manage entrepreneurship programs')
                ->name('update');
            Route::delete('{program}', [EntrepreneurshipProgramController::class, 'destroy'])
                ->middleware('permission:manage entrepreneurship programs')
                ->name('destroy');
        });

        // Participation Opportunities
        Route::prefix('participation')->name('participation.')->group(function () {
            Route::get('opportunities', [ParticipationOpportunityController::class, 'index'])->name('opportunities');
            Route::get('manage', [ParticipationOpportunityController::class, 'manage'])
                ->middleware('permission:manage participation opportunities')
                ->name('manage');
            Route::get('create', [ParticipationOpportunityController::class, 'create'])
                ->middleware('permission:manage participation opportunities')
                ->name('create');
            Route::post('', [ParticipationOpportunityController::class, 'store'])
                ->middleware('permission:manage participation opportunities')
                ->name('store');
            Route::get('{opportunity}', [ParticipationOpportunityController::class, 'show'])->name('show');
            Route::get('{opportunity}/edit', [ParticipationOpportunityController::class, 'edit'])
                ->middleware('permission:manage participation opportunities')
                ->name('edit');
            Route::patch('{opportunity}', [ParticipationOpportunityController::class, 'update'])
                ->middleware('permission:manage participation opportunities')
                ->name('update');
            Route::delete('{opportunity}', [ParticipationOpportunityController::class, 'destroy'])
                ->middleware('permission:manage participation opportunities')
                ->name('destroy');
        });

        // Marketing Resources
        Route::prefix('marketing')->name('marketing.')->group(function () {
            Route::get('', [MarketingResourceController::class, 'index'])->name('index');
            Route::get('manage', [MarketingResourceController::class, 'manage'])
                ->middleware('permission:manage marketing resources')
                ->name('manage');
            Route::get('create', [MarketingResourceController::class, 'create'])
                ->middleware('permission:manage marketing resources')
                ->name('create');
            Route::post('', [MarketingResourceController::class, 'store'])
                ->middleware('permission:manage marketing resources')
                ->name('store');
            Route::get('{resource}', [MarketingResourceController::class, 'show'])->name('show');
            Route::get('{resource}/edit', [MarketingResourceController::class, 'edit'])
                ->middleware('permission:manage marketing resources')
                ->name('edit');
            Route::patch('{resource}', [MarketingResourceController::class, 'update'])
                ->middleware('permission:manage marketing resources')
                ->name('update');
            Route::delete('{resource}', [MarketingResourceController::class, 'destroy'])
                ->middleware('permission:manage marketing resources')
                ->name('destroy');
        });

        // Member Files
        Route::prefix('files')->name('files.')->group(function () {
            Route::get('', [MemberFileController::class, 'index'])->name('index');
            Route::get('manage', [MemberFileController::class, 'manage'])
                ->middleware('permission:manage member files')
                ->name('manage');
            Route::get('create', [MemberFileController::class, 'create'])
                ->middleware('permission:manage member files')
                ->name('create');
            Route::post('', [MemberFileController::class, 'store'])
                ->middleware('permission:manage member files')
                ->name('store');
            Route::get('{file}', [MemberFileController::class, 'show'])->name('show');
            Route::get('{file}/edit', [MemberFileController::class, 'edit'])
                ->middleware('permission:manage member files')
                ->name('edit');
            Route::patch('{file}', [MemberFileController::class, 'update'])
                ->middleware('permission:manage member files')
                ->name('update');
            Route::delete('{file}', [MemberFileController::class, 'destroy'])
                ->middleware('permission:manage member files')
                ->name('destroy');
        });

        // Communications
        Route::prefix('communication')->name('communication.')->group(function () {
            Route::get('', [CommunicationController::class, 'index'])->name('index');
            Route::get('manage', [CommunicationController::class, 'manage'])
                ->middleware('permission:manage communications')
                ->name('manage');
            Route::get('create', [CommunicationController::class, 'create'])
                ->middleware('permission:manage communications')
                ->name('create');
            Route::post('', [CommunicationController::class, 'store'])
                ->middleware('permission:manage communications')
                ->name('store');
            Route::get('{communication}', [CommunicationController::class, 'show'])->name('show');
            Route::get('{communication}/edit', [CommunicationController::class, 'edit'])
                ->middleware('permission:manage communications')
                ->name('edit');
            Route::patch('{communication}', [CommunicationController::class, 'update'])
                ->middleware('permission:manage communications')
                ->name('update');
            Route::delete('{communication}', [CommunicationController::class, 'destroy'])
                ->middleware('permission:manage communications')
                ->name('destroy');
        });

        // Portal Opportunities
        Route::prefix('portal')->name('portal-opportunities.')->group(function () {
            Route::get('opportunities', [PortalOpportunityController::class, 'index'])->name('index');
            Route::get('volunteering', [PortalOpportunityController::class, 'index'])->name('volunteering');
            Route::get('manage', [PortalOpportunityController::class, 'manage'])
                ->middleware('permission:manage portal opportunities')
                ->name('manage');
            Route::get('create', [PortalOpportunityController::class, 'create'])
                ->middleware('permission:manage portal opportunities')
                ->name('create');
            Route::post('', [PortalOpportunityController::class, 'store'])
                ->middleware('permission:manage portal opportunities')
                ->name('store');
            Route::get('{opportunity}', [PortalOpportunityController::class, 'show'])->name('show');
            Route::get('{opportunity}/edit', [PortalOpportunityController::class, 'edit'])
                ->middleware('permission:manage portal opportunities')
                ->name('edit');
            Route::patch('{opportunity}', [PortalOpportunityController::class, 'update'])
                ->middleware('permission:manage portal opportunities')
                ->name('update');
            Route::delete('{opportunity}', [PortalOpportunityController::class, 'destroy'])
                ->middleware('permission:manage portal opportunities')
                ->name('destroy');
        });
    });
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
    | Pages Management - صلاحيات محددة
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin|staff')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('pages', PageController::class)->except(['show']);
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

        Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])
            ->middleware('permission:manage roles')
            ->name('permissions.index');

        Route::post('permissions/{permission}/roles', [App\Http\Controllers\PermissionController::class, 'updateRoles'])
            ->middleware('permission:manage roles')
            ->name('permissions.update-roles');
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
    | Member Card Management
    |--------------------------------------------------------------------------
    */
    Route::get('member-profile', [MemberCardController::class, 'profile'])
        ->name('member.profile');

    Route::get('member-card/{membership}', [MemberCardController::class, 'showCard'])
        ->name('member-card.show');

    Route::get('member-card/{membership}/download', [MemberCardController::class, 'downloadCard'])
        ->name('member-card.download');

    Route::post('member-card/{membership}/reissue', [MemberCardController::class, 'reissueCard'])
        ->name('member-card.reissue');

    Route::get('member-card/{membership}/data', [MemberCardController::class, 'getData'])
        ->name('member-card.data');

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
