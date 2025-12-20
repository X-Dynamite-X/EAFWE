<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * عرض صفحة الإعدادات
     */
    public function index()
    {
        $user = Auth::user();
        return view('pages.dashboard.settings.index', compact('user'));
    }

    /**
     * تحديث الإعدادات
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'language' => 'required|in:ar,en',
            'theme' => 'required|in:light,dark',
            'notifications' => 'boolean',
        ], [
            'language.required' => 'اللغة مطلوبة',
            'language.in' => 'اللغة غير صحيحة',
            'theme.required' => 'المظهر مطلوب',
            'theme.in' => 'المظهر غير صحيح',
        ]);

        // يمكن حفظ الإعدادات في قاعدة البيانات أو session
        session(['preferences' => $validated]);

        return back()->with('success', 'تم تحديث الإعدادات بنجاح');
    }
}
