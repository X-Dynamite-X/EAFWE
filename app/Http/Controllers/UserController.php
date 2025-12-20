<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * User Controller
 * إدارة المستخدمين
 */
class UserController extends Controller
{
    /**
     * عرض قائمة المستخدمين
     */
    public function index(): View
    {
        $this->authorize('view users');

        $users = User::with('roles')
            ->paginate(15);

        return view('pages.dashboard.users', [
            'users' => $users,
        ]);
    }

    /**
     * عرض صفحة إنشاء مستخدم جديد
     */
    public function create(): View
    {
        $this->authorize('create users');

        return view('pages.dashboard.users-create');
    }

    /**
     * حفظ مستخدم جديد
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create users');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|string',
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'هذا البريد مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'role.required' => 'يجب اختيار دور',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => bcrypt($validated['password']),
            'is_active' => true,
        ]);

        // إسناد الدور
        $user->assignRole($validated['role']);

        return redirect()
            ->route('users.index')
            ->with('success', 'تم إنشاء المستخدم بنجاح');
    }

    /**
     * عرض صفحة تعديل المستخدم
     */
    public function edit(User $user): View
    {
        $this->authorize('edit users');

        return view('pages.dashboard.users-edit', [
            'user' => $user,
        ]);
    }

    /**
     * تحديث بيانات المستخدم
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $this->authorize('edit users');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'is_active' => $request->has('is_active'),
        ]);

        // تحديث الدور
        $user->syncRoles([$validated['role']]);

        return redirect()
            ->route('users.index')
            ->with('success', 'تم تحديث المستخدم بنجاح');
    }

    /**
     * حذف المستخدم
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->authorize('delete users');

        // منع حذف المستخدم الحالي
        if ($user->id === auth()->id()) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن حذف حسابك الخاص');
        }

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'تم حذف المستخدم بنجاح');
    }
}
