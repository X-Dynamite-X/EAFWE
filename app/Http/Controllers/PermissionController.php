<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * عرض قائمة الصلاحيات
     */
    public function index(): View
    {
        $this->authorize('manage roles');

        $permissions = Permission::with('roles')->orderBy('name')->paginate(20);
        $roles = Role::where('name', '!=', 'super_admin')->orderBy('name')->get();

        return view('pages.dashboard.permissions', [
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }

    /**
     * تحديث أدوار الصلاحية
     */
    public function updateRoles(Request $request, Permission $permission): RedirectResponse
    {
        $this->authorize('manage roles');

        $validated = $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,id',
        ]);

        $roles = $validated['roles'] ?? [];
        $permission->syncRoles($roles);

        return redirect()->route('permissions.index')
            ->with('success', 'تم تحديث أدوار الصلاحية بنجاح');
    }
}
