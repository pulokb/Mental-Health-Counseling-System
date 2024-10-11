<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{

    use FastRefreshDatabase;

    private function adminCreate()
    {
        return User::factory()->create();
    }

    private function adminData()
    {
        return ['name' => 'Dummy admin','email' => 'dummy@admin.com','password' =>'dymmy_password'];
    }



    public function test_admin_can_visit_admin_list_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.admins.index'));

        $response->assertOk();
    }


     public function test_admin_can_visit_admin_create_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.admins.create'));

        $response->assertOk();
    }


    public function test_admin_can_store_admin()
    {
        $adminData = $this->adminData();

        $response = $this->actingAs($this->admin)->post(route('admin.admins.store'),$adminData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.admins.index'));
        $this->assertDatabaseHas('users', [array_keys($adminData)[0] => $adminData[array_keys($adminData)[0]]]);
    }


    public function test_admin_can_visit_admin_show_page()
    {
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->admin)->get(route('admin.admins.show',$admin->id));

        $response->assertOk();
        $response->assertViewHas('admin', $admin);
    }


    public function test_admin_can_visit_admin_edit_page()
    {
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->admin)->get(route('admin.admins.edit',$admin->id));

        $response->assertOk();
        $response->assertViewHas('admin', $admin);
    }


    public function test_admin_can_update_admin()
    {
        $adminData = $this->adminData();
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->admin)->put(route('admin.admins.update',$admin->id),$adminData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [array_keys($adminData)[0] => $adminData[array_keys($adminData)[0]]]);
    }


    public function test_admin_can_delete_admin()
    {
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->admin)->delete(route('admin.admins.destroy',$admin->id));

        $response->assertOk();
        $this->assertDatabaseMissing('admins',['id'=>$admin->id]);
    }


 // No permission admin

    public function test_no_permission_admin_cannot_access_admin_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.admins.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_admin_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.admins.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_admin_edit_page()
    {
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.admins.edit',$admin->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_admin_show_page()
    {
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.admins.show',$admin->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_store_admin()
    {
        $adminData = $this->adminData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.admins.store'),$adminData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_update_admin()
    {
        $adminData = $this->adminData();
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.admins.update',$admin->id),$adminData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_delete_admin()
    {
        $admin = $this->adminCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.admins.destroy',$admin->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
