<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontendNavigationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\RolesAndPermissionsSeeder::class);
        $this->branch = Branch::create(['name' => 'Test Branch', 'code' => 'TB01']);
    }

    public function test_admin_can_access_all_dashboard_sections()
    {
        $admin = User::factory()->create(['branch_id' => $this->branch->id]);
        $admin->assignRole('Administrator');

        // Staff accounts have 2FA enabled by default in our setup
        $admin->update(['two_factor_confirmed_at' => now()]);

        $this->actingAs($admin);

        $routes = [
            'dashboard',
            'jobs',
            'service-requests',
            'mobile-services',
            'customers',
            'equipment',
            'inventory',
            'quotations',
            'invoices',
            'trucks',
            'truck-hire-requests',
        ];

        foreach ($routes as $route) {
            $response = $this->get(route($route));
            $response->assertStatus(200);
        }
    }
}
