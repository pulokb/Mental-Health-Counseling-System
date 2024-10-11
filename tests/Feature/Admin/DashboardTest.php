<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_visit_dashboard_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.dashboard'));

        $response->assertOk();
    }


    public function test_non_permitted_admin_cannot_visit_dashboard_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.dashboard'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

}
