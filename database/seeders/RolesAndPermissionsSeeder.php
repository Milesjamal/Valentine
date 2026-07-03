<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'manage users',
            'manage roles',
            'manage settings',
            'view analytics',
            'manage branches',
            'manage customers',
            'view customers',
            'manage equipment',
            'view equipment',
            'manage services',
            'manage jobs',
            'update jobs',
            'view jobs',
            'manage quotations',
            'manage invoices',
            'manage payments',
            'manage inventory',
            'manage trucks',
            'view audit logs',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Super Admin gets all permissions
        Role::create(['name' => 'Super Admin']);

        // Administrator
        $admin = Role::create(['name' => 'Administrator']);
        $admin->givePermissionTo([
            'view analytics',
            'manage customers',
            'manage equipment',
            'manage services',
            'manage jobs',
            'manage quotations',
            'manage invoices',
            'manage payments',
            'manage inventory',
            'manage trucks',
        ]);

        // Workshop Manager
        $manager = Role::create(['name' => 'Workshop Manager']);
        $manager->givePermissionTo([
            'view customers',
            'view equipment',
            'manage jobs',
            'update jobs',
            'manage quotations',
            'manage invoices',
            'manage payments',
            'manage inventory',
            'manage trucks',
        ]);

        // Mechanic
        $mechanic = Role::create(['name' => 'Mechanic']);
        $mechanic->givePermissionTo([
            'view customers',
            'view equipment',
            'update jobs',
            'view jobs',
        ]);

        // Customer
        $customer = Role::create(['name' => 'Customer']);
    }
}
