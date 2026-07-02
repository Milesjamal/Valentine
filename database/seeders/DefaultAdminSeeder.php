<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    public function run(): void
    {
        $branch = Branch::create([
            'name' => 'Harare Main',
            'code' => 'HRE-01',
            'city' => 'Harare',
            'is_active' => true,
        ]);

        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@geartrail.com',
            'password' => Hash::make('Password123!'),
            'branch_id' => $branch->id,
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        $admin->assignRole('Super Admin');
    }
}
