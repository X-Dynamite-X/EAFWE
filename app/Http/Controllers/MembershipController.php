<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Enums\ServerCountry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Membership Controller
 * إدارة طلبات العضوية
 */
class MembershipController extends Controller
{
    /**
     * عرض قائمة طلبات العضوية
     */
    public function index(Request $request): View
    {
        $this->authorize('view memberships');

        $query = Membership::with('user');

        // التصفية حسب الحالة
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $memberships = $query
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('pages.dashboard.memberships', [
            'memberships' => $memberships,
        ]);
    }

    /**
     * عرض صفحة إنشاء طلب عضوية
     */
    public function create(): View
    {
        return view('pages.dashboard.memberships-create', [
            'countries' => ServerCountry::options(),
            'membershipTypes' => [
                'basic' => 'عضوية أساسية',
                'premium' => 'عضوية متميزة',
                'enterprise' => 'عضوية مؤسسية',
            ],
        ]);
    }

    /**
     * حفظ طلب عضوية جديد
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create memberships');

        $validated = $request->validate([
            'membership_type' => 'required|in:basic,premium,enterprise',
            'country' => 'required|string',
            'company_name' => 'nullable|string|max:255',
            'description' => 'required|string|min:10|max:1000',
        ], [
            'membership_type.required' => 'نوع العضوية مطلوب',
            'country.required' => 'البلد مطلوب',
            'description.required' => 'الوصف مطلوب',
            'description.min' => 'الوصف يجب أن يكون 10 أحرف على الأقل',
        ]);

        Membership::create([
            'user_id' => auth()->id(),
            'membership_type' => $validated['membership_type'],
            'country' => $validated['country'],
            'company_name' => $validated['company_name'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        return redirect()
            ->route('memberships.index')
            ->with('success', 'تم إرسال طلب العضوية بنجاح، سيتم مراجعته قريباً');
    }

    /**
     * عرض تفاصيل طلب العضوية
     */
    public function show(Membership $membership): View
    {
        $this->authorize('view memberships');

        return view('pages.dashboard.memberships-show', [
            'membership' => $membership->load('user', 'approvedBy'),
        ]);
    }

    /**
     * الموافقة على طلب العضوية
     */
    public function approve(Request $request, Membership $membership): RedirectResponse|JsonResponse
    {
        $this->authorize('approve memberships');

        // منع الموافقة على طلب موافق عليه مسبقاً
        if (!$membership->isPending()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'هذا الطلب تمت معالجته بالفعل'
                ], 422);
            }
            return redirect()
                ->back()
                ->with('error', 'هذا الطلب تمت معالجته بالفعل');
        }

        DB::transaction(function () use ($membership) {
            $membership->update([
                'status' => 'approved',
                'approved_by' => auth()->id(),
                'approval_date' => now(),
            ]);

            // إسناد دور "member" للمستخدم
            $membership->user->assignRole('member');
        });

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'تم الموافقة على الطلب بنجاح',
                'membership' => $membership
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'تم الموافقة على الطلب بنجاح');
    }

    /**
     * رفض طلب العضوية
     */
    public function reject(Request $request, Membership $membership): RedirectResponse|JsonResponse
    {
        $this->authorize('reject memberships');

        // منع رفض طلب معالج مسبقاً
        if (!$membership->isPending()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'هذا الطلب تمت معالجته بالفعل'
                ], 422);
            }
            return redirect()
                ->back()
                ->with('error', 'هذا الطلب تمت معالجته بالفعل');
        }

        $validated = $request->validate([
            'rejection_reason' => 'required|string|min:10|max:500',
        ]);

        $membership->update([
            'status' => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
            'approved_by' => auth()->id(),
            'approval_date' => now(),
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'تم رفض الطلب بنجاح',
                'membership' => $membership
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'تم رفض الطلب');
    }

    /**
     * حذف طلب العضوية
     */
    public function destroy(Request $request, Membership $membership): RedirectResponse|JsonResponse
    {
        $this->authorize('delete memberships');

        // السماح بحذف الطلب فقط إذا كان معلقاً والمالك هو صاحب الطلب أو admin
        if (!$membership->isPending() && !auth()->user()->hasRole('admin')) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'لا يمكن حذف هذا الطلب'
                ], 422);
            }
            return redirect()
                ->back()
                ->with('error', 'لا يمكن حذف هذا الطلب');
        }

        $membership->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'تم حذف الطلب بنجاح'
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'تم حذف الطلب بنجاح');
    }
}
