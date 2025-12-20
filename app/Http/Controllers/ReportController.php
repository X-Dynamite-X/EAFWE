<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Membership;

class ReportController extends Controller
{
    /**
     * عرض صفحة التقارير
     */
    public function index()
    {
        // التحقق من الصلاحية
        $this->authorize('view reports');

        // إحصائيات عامة
        $totalUsers = User::count();
        $totalMemberships = Membership::count();
        $pendingMemberships = Membership::where('status', 'pending')->count();
        $approvedMemberships = Membership::where('status', 'approved')->count();

        // البيانات للجداول
        $recentUsers = User::latest()->limit(10)->get();
        $recentMemberships = Membership::with('user')->latest()->limit(10)->get();

        return view('pages.dashboard.reports.index', compact(
            'totalUsers',
            'totalMemberships',
            'pendingMemberships',
            'approvedMemberships',
            'recentUsers',
            'recentMemberships'
        ));
    }
}
