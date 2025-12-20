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
        return view('pages.dashboard.profile.edit', compact('user'));
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
