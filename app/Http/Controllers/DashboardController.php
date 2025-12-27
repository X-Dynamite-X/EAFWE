<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * Dashboard Controller
 * التحكم في لوحة التحكم والإحصائيات
 */
class DashboardController extends Controller
{
    /**
     * عرض لوحة التحكم
     */
    public function index(): View
    {
        // إحصائيات عامة
        $totalUsers = User::count();
        $activeUsers = User::where('is_active', true)->count();
        $pendingMemberships = Membership::where('status', 'pending')->count();
        $approvedMemberships = Membership::where('status', 'approved')->count();
        $totalRoles = Role::count();
        // آخر المستخدمين
        $recentUsers = User::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // آخر طلبات العضوية
        $recentMemberships = Membership::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('pages.dashboard.index', [
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'pendingMemberships' => $pendingMemberships,
            'approvedMemberships' => $approvedMemberships,
            'totalRoles' => $totalRoles,
            'recentUsers' => $recentUsers,
            'recentMemberships' => $recentMemberships,
        ]);
    }
}
