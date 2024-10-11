<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class MaintenanceModeTest extends TestCase
{
    use FastRefreshDatabase;

    public function test_admin_can_visit_maintenance_mode_setup_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.maintenanceMode'));

        $response->assertOk();
    }


    // public function test_admin_can_start_maintenance_mode()
    // {
    //     $response = $this->actingAs($this->admin)->post(route('admin.maintenanceModeUpdate',['status' => 'down']));

    //     $response->assertRedirect();
    // }



    // public function test_admin_can_stop_maintenance_mode()
    // {
    //     $response = $this->actingAs($this->admin)->post(route('admin.maintenanceModeUpdate',['status' => 'up']));

    //     $response->assertRedirect();
    // }


}
