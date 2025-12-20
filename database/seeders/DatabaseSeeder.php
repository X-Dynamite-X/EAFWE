<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\RolePermissionService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // إنشاء الأدوار والصلاحيات
        RolePermissionService::createDefaultRolesAndPermissions();

        // إنشاء مستخدم admin
        $admin = User::create([
            'name' => 'مدير النظام',
            'email' => 'admin@eafwe.com',
            'phone' => '+966501234567',
            'password' => bcrypt('password123'),
            'is_active' => true,
        ]);
        $admin->assignRole('admin');

        // إنشاء مستخدم staff
        $staff = User::create([
            'name' => 'موظف المراجعة',
            'email' => 'staff@eafwe.com',
            'phone' => '+966502345678',
            'password' => bcrypt('password123'),
            'is_active' => true,
        ]);
        $staff->assignRole('staff');

        // إنشاء مستخدمين عاديين
        User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) {
                $user->assignRole('member');
            });
    }
}
