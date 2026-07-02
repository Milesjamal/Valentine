<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Branch;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(RolesAndPermissionsSeeder::class);
    }

    public function test_dashboard_redirects_to_login_if_unauthenticated(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_staff_user_redirected_to_2fa_setup_if_not_confirmed(): void
    {
        $branch = Branch::create(['name' => 'Test', 'code' => 'T1']);
        $user = User::factory()->create([
            'branch_id' => $branch->id,
            'two_factor_confirmed_at' => null,
        ]);
        $user->assignRole('Administrator');

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(302);
        $response->assertRedirect('/2fa-setup');
    }

    public function test_staff_user_can_access_dashboard_if_2fa_confirmed(): void
    {
        $branch = Branch::create(['name' => 'Test', 'code' => 'T1']);
        $user = User::factory()->create([
            'branch_id' => $branch->id,
            'two_factor_confirmed_at' => now(),
        ]);
        $user->assignRole('Administrator');

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
    }
}
