<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * خدمة إدارة الأدوار والصلاحيات
 * توفر طرق مساعدة لإنشاء وإدارة الأدوار والصلاحيات
 */
class RolePermissionService
{
    /**
     * إنشاء الأدوار والصلاحيات الافتراضية
     */
    public static function createDefaultRolesAndPermissions()
    {
        // إنشاء الأدوار
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $staffRole = Role::firstOrCreate(['name' => 'staff', 'guard_name' => 'web']);
        $memberRole = Role::firstOrCreate(['name' => 'member', 'guard_name' => 'web']);

        // إنشاء الصلاحيات
        $permissions = [
            // صلاحيات المستخدمين
            'view users',
            'create users',
            'edit users',
            'delete users',

            // صلاحيات الأدوار
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'manage roles',

            // صلاحيات طلبات العضوية
            'view memberships',
            'create memberships',
            'edit memberships',
            'approve memberships',
            'reject memberships',
            'delete memberships',

            // صلاحيات التقارير
            'view reports',
            'export reports',

            // صلاحيات الإعدادات
            'manage settings',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // إسناد الصلاحيات للأدوار
        $adminPermissions = Permission::where('guard_name', 'web')->pluck('name')->toArray();
        $adminRole->syncPermissions($adminPermissions);

        $staffPermissions = [
            'view users',
            'view memberships',
            'approve memberships',
            'reject memberships',
            'view reports',
        ];
        $staffRole->syncPermissions($staffPermissions);

        $memberPermissions = [
            'view memberships',
            'create memberships',
        ];
        $memberRole->syncPermissions($memberPermissions);
    }

    /**
     * إعطاء دور للمستخدم
     */
    public static function assignRoleToUser($user, $role)
    {
        $user->assignRole($role);
    }

    /**
     * إزالة دور من المستخدم
     */
    public static function removeRoleFromUser($user, $role)
    {
        $user->removeRole($role);
    }

    /**
     * التحقق من أن المستخدم لديه دور معين
     */
    public static function userHasRole($user, $role)
    {
        return $user->hasRole($role);
    }

    /**
     * التحقق من أن المستخدم لديه صلاحية معينة
     */
    public static function userHasPermission($user, $permission)
    {
        return $user->can($permission);
    }

    /**
     * الحصول على جميع صلاحيات الدور
     */
    public static function getRolePermissions($role)
    {
        if (is_string($role)) {
            $role = Role::findByName($role);
        }

        return $role->permissions()->get();
    }
}
