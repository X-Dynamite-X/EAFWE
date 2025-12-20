<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\ServerCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * عرض صفحة التسجيل
     */
    public function show(): View
    {
        return view('pages.auth.register', [
            'countries' => ServerCountry::options(),
        ]);
    }

    /**
     * معالجة التسجيل
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'membership_type' => 'required|in:basic,premium,enterprise',
            'password' => 'required|min:8|confirmed',
            'agree_terms' => 'accepted',
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'هذا البريد مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'كلمات المرور غير متطابقة',
            'agree_terms.accepted' => 'يجب الموافقة على الشروط',
        ]);

        // إنشاء المستخدم
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => bcrypt($validated['password']),
            'is_active' => true,
        ]);

        // إسناد دور عضو
        $user->assignRole('member');

        // تسجيل الدخول التلقائي
        Auth::login($user);

        return redirect()
            ->route('memberships.create')
            ->with('success', 'تم إنشاء حسابك بنجاح! الآن أرسل طلب عضويتك');
    }
}
