<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Role Controller
 * إدارة الأدوار والصلاحيات
 */
class RoleController extends Controller
{
    /**
     * عرض قائمة الأدوار
     */
    public function index(): View
    {
        $this->authorize('manage roles');

        $roles = Role::with('permissions')
            ->where('name', '!=', 'super_admin')
            ->paginate(15);

        $permissions = Permission::orderBy('name')->get();

        return view('pages.dashboard.roles', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }

    /**
     * عرض صفحة إنشاء دور جديد
     */
    public function create(): View
    {
        $this->authorize('manage roles');

        $permissions = Permission::orderBy('name')->get();

        return view('pages.dashboard.roles-create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * حفظ دور جديد
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('manage roles');

        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name|max:255',
            'description' => 'nullable|string|max:500',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ], [
            'name.required' => 'اسم الدور مطلوب',
            'name.unique' => 'هذا الدور موجود بالفعل',
        ]);

        $role = Role::create([
            'name' => $validated['name'],
            'guard_name' => 'web',
        ]);

        if (!empty($validated['permissions'])) {
            $permissions = Permission::whereIn('id', $validated['permissions'])->get();
            $role->syncPermissions($permissions);
        }

        return redirect()
            ->route('roles.index')
            ->with('success', 'تم إنشاء الدور بنجاح');
    }

    /**
     * عرض صفحة تعديل الدور
     */
    public function edit(Role $role): View
    {
        $this->authorize('manage roles');

        // منع تعديل super_admin
        if ($role->name === 'super_admin') {
            abort(403);
        }

        $permissions = Permission::orderBy('name')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('pages.dashboard.roles-edit', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ]);
    }

    /**
     * تحديث الدور
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $this->authorize('manage roles');

        // منع تعديل super_admin
        if ($role->name === 'super_admin') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id . '|max:255',
            'description' => 'nullable|string|max:500',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        $role->update([
            'name' => $validated['name'],
        ]);

        if (!empty($validated['permissions'])) {
            $permissions = Permission::whereIn('id', $validated['permissions'])->get();
            $role->syncPermissions($permissions);
        }

        return redirect()
            ->route('roles.index')
            ->with('success', 'تم تحديث الدور بنجاح');
    }

    /**
     * حذف الدور
     */
    public function destroy(Role $role)
    {
        $this->authorize('manage roles');

        // منع حذف الأدوار الافتراضية
        if (in_array($role->name, ['super_admin', 'admin', 'staff', 'member'])) {
            return redirect()
                ->back()
                ->with('error', 'لا يمكن حذف هذا الدور');
        }

        $role->delete();
        return response()->json([
            'success' => true,
            'message' => 'تم حذف الدور بنجاح',
        ]);
    }
}
