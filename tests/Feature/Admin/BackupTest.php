<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class BackupTest extends TestCase
{

    use FastRefreshDatabase;

    public function test_admin_can_visit_backup_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.backups.index'));

        $response->assertOk();
    }


    // public function test_admin_can_create_database_backup()
    // {
    //     $response = $this->actingAs($this->admin)->get(route('admin.backup'));

    //     $response->assertRedirect();
    // }


    // public function test_admin_can_create_full_backup()
    // {
    //     $response = $this->actingAs($this->admin)->post(route('admin.backups.store'));

    //     $response->assertRedirect();
    // }


    // public function test_admin_can_clean_backup()
    // {
    //     $response = $this->actingAs($this->admin)->post(route('admin.backups.clean'));

    //     $response->assertRedirect();
    // }


    public function test_no_permission_admin_cannot_visit_backup_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.backups.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
