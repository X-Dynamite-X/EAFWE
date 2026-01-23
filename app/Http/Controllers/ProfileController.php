<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * عرض صفحة تعديل الملف الشخصي
     */
    public function edit()
    {
        $user = Auth::user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        // إنشاء token للبطاقة إذا لم يكن موجوداً لضمان إمكانية التنزيل
        if ($membership && !$membership->card_token) {
            $membership->card_token = \Illuminate\Support\Str::random(32) . '-' . time();
            $membership->card_issued_at = now();
            $membership->save();
        }

        return view('pages.dashboard.profile.edit', compact('user', 'membership'));
    }

    /**
     * تحديث الملف الشخصي
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل',
            'phone.max' => 'رقم الهاتف طويل جداً',
        ]);

        Auth::user()->update($validated);

        return back()->with('success', 'تم تحديث ملفك الشخصي بنجاح');
    }
}
