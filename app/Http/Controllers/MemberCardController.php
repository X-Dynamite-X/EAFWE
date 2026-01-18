<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use PDF;

/**
 * Member Card Controller
 * التحكم في بطاقات العضوية
 */
class MemberCardController extends Controller
{
    /**
     * عرض ملف العضو الشخصي
     */
    public function profile()
    {
        $user = Auth::user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        if (!$membership) {
            return redirect()->route('dashboard')
                ->with('warning', 'لم يتم الموافقة على عضويتك بعد');
        }

        return view('pages.member.profile', [
            'user' => $user,
            'membership' => $membership,
            'cardStatus' => $this->getCardStatus($membership),
        ]);
    }

    /**
     * عرض بطاقة العضوية
     */
    public function showCard($membershipId)
    {
        $membership = Membership::findOrFail($membershipId);

        // التحقق من أن المستخدم هو مالك العضوية
        if ($membership->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        // إنشاء token للبطاقة إذا لم يكن موجود
        if (!$membership->card_token) {
            $membership->card_token = Str::random(32) . '-' . time();
            $membership->card_issued_at = now();
            $membership->save();
        }

        return view('pages.member.card', [
            'membership' => $membership,
            'user' => $membership->user,
            'qrCodeUrl' => route('member-card.verify', $membership->card_token),
        ]);
    }

    /**
     * تنزيل بطاقة العضوية
     */
    public function downloadCard($membershipId)
    {
        $membership = Membership::findOrFail($membershipId);

        // التحقق من الصلاحيات
        if ($membership->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        // إنشاء token للبطاقة إذا لم يكن موجود
        if (!$membership->card_token) {
            $membership->card_token = Str::random(32) . '-' . time();
            $membership->card_issued_at = now();
            $membership->save();
        }

        // إنشاء PDF للبطاقة
        $qrCodeData = QrCode::format('svg')->size(200)->generate(
            route('member-card.verify', $membership->card_token)
        );

        $html = view('pages.member.card-pdf', [
            'membership' => $membership,
            'user' => $membership->user,
            'qrCodeData' => $qrCodeData,
        ])->render();

        // حفظ كـ PDF
        $fileName = 'membership-card-' . $membership->user_id . '-' . time() . '.pdf';

        // استخدام TCPDF أو دومنيل إذا كان متوفر
        try {
            // إذا كان dompdf متوفر
            if (class_exists('Barryvdh\DomPDF\Facade\Pdf')) {
                return PDF::loadHTML($html)
                    ->download($fileName);
            }
        } catch (\Exception $e) {
            // تنزيل كـ HTML إذا لم يكن PDF متوفر
            return response($html)
                ->header('Content-Type', 'text/html; charset=utf-8')
                ->header('Content-Disposition', 'attachment; filename=' . $fileName . '.html');
        }

        return response($html)
            ->header('Content-Type', 'text/html; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename=' . $fileName . '.html');
    }

    /**
     * التحقق من صحة البطاقة عبر QR Code
     */
    public function verify($cardToken)
    {
        $membership = Membership::where('card_token', $cardToken)->firstOrFail();

        // تحديث حالة التحقق
        $membership->update(['card_verified' => true]);

        // تسجيل عملية التحقق
        \Log::info('Card verification', [
            'membership_id' => $membership->id,
            'user_id' => $membership->user_id,
            'verified_at' => now(),
            'user_agent' => request()->userAgent(),
            'ip' => request()->ip(),
        ]);

        return view('pages.member.card-verification', [
            'membership' => $membership,
            'user' => $membership->user,
            'isValid' => true,
        ]);
    }

    /**
     * الحصول على حالة البطاقة
     */
    private function getCardStatus($membership)
    {
        return [
            'has_card' => !is_null($membership->card_token),
            'issued_at' => $membership->card_issued_at,
            'verified' => $membership->card_verified,
            'token' => $membership->card_token,
        ];
    }

    /**
     * عرض بيانات العضو بتنسيق JSON (للتحقق)
     */
    public function getData($cardToken)
    {
        $membership = Membership::where('card_token', $cardToken)
            ->with('user')
            ->firstOrFail();

        // إذا كانت العضوية غير موافق عليها، لا تعيد البيانات
        if ($membership->status !== 'approved') {
            return response()->json([
                'valid' => false,
                'message' => 'هذه العضوية غير موافق عليها',
            ], 403);
        }

        return response()->json([
            'valid' => true,
            'member' => [
                'id' => $membership->user_id,
                'name' => $membership->user->name,
                'email' => $membership->user->email,
                'membership_type' => $membership->membership_type,
                'country' => $membership->country,
                'company_name' => $membership->company_name,
                'approval_date' => $membership->approval_date->format('Y-m-d'),
                'status' => $membership->status,
            ],
        ]);
    }

    /**
     * إعادة إصدار بطاقة (إنشاء token جديد)
     */
    public function reissueCard($membershipId)
    {
        $membership = Membership::findOrFail($membershipId);

        // التحقق من الصلاحيات
        if ($membership->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        // إنشاء token جديد
        $membership->update([
            'card_token' => Str::random(32) . '-' . time(),
            'card_issued_at' => now(),
            'card_verified' => false,
        ]);

        return back()->with('success', 'تم إعادة إصدار البطاقة بنجاح');
    }
}
