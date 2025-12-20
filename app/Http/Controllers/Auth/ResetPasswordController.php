<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /**
     * عرض نموذج إعادة تعيين كلمة المرور
     */
    public function show($token)
    {
        return view('pages.auth.reset-password', ['token' => $token]);
    }

    /**
     * معالجة طلب إعادة تعيين كلمة المرور
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.exists' => 'لا يوجد حساب مرتبط بهذا البريد الإلكتروني',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون على الأقل 8 أحرف',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
        ]);

        // إعادة تعيين كلمة المرور
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        // إذا تم تغيير كلمة المرور بنجاح
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'تم إعادة تعيين كلمة المرور بنجاح. يمكنك الآن تسجيل الدخول.');
        }

        return back()->withErrors(['email' => [__($status)]]);
    }
}
