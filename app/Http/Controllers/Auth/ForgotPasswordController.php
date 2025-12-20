<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * عرض نموذج طلب إعادة تعيين كلمة المرور
     */
    public function show()
    {
        return view('pages.auth.forgot-password');
    }

    /**
     * إرسال رابط إعادة تعيين كلمة المرور
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.exists' => 'لا يوجد حساب مرتبط بهذا البريد الإلكتروني'
        ]);

        // إرسال رابط إعادة تعيين كلمة المرور
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
