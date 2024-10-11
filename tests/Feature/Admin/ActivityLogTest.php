<?php

namespace Tests\Feature\Admin;

use App\Models\LoginActivity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class ActivityLogTest extends TestCase
{

    use FastRefreshDatabase;


    public function test_admin_can_access_user_login_activity_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.userLoginActivity'));

        $response->assertOk();
    }


    public function test_admin_can_access_admin_login_activity_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.adminLoginActivity'));

        $response->assertOk();
    }


    public function test_admin_can_delete_login_activity_log()
    {
        $loginActivity = LoginActivity::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.deleteLoginActivity',$loginActivity->id));

        $response->assertOk();
        $this->assertDatabaseMissing('login_activities',['id'=>$loginActivity->id]);

    }


    public function test_admin_can_delete_user_all_login_activity_log()
    {
        LoginActivity::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.deleteUserLoginActivity'));

        $response->assertRedirect();
    }


    public function test_admin_can_delete_admin_all_login_activity_log()
    {
        LoginActivity::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.deleteAdminLoginActivity'));

        $response->assertRedirect();
    }



    public function test_admin_can_access_system_activity_log_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.systemActivityLog'));

        $response->assertOk();
    }



    public function test_admin_can_delete_all_system_activity_log_page()
    {
        $response = $this->actingAs($this->admin)->delete(route('admin.deleteAllSystemLogActivity'));

        $response->assertRedirect();
    }

    //no permission admin
    public function test_no_permission_admin_cannot_access_user_login_activity_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.userLoginActivity'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_admin_login_activity_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.adminLoginActivity'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_system_activity_log_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.systemActivityLog'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
