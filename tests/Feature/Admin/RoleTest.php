<?php

namespace Tests\Feature\Admin;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{

    use FastRefreshDatabase;

    private function roleCreate()
    {
        return Role::create(['name' => 'dummy','description' => 'dummy']);
    }

    private function roleData()
    {
        return ['name' => 'dummy','description' => 'dummy'];
    }



    public function test_admin_can_visit_role_list_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.roles.index'));

        $response->assertOk();
    }


     public function test_admin_can_visit_role_create_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.roles.create'));

        $response->assertOk();
    }


    public function test_admin_can_store_role()
    {
        $roleData = $this->roleData();

        $response = $this->actingAs($this->admin)->post(route('admin.roles.store'),$roleData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.roles.index'));
        $this->assertDatabaseHas('roles', [array_keys($roleData)[0] => $roleData[array_keys($roleData)[0]]]);
    }


    // public function test_admin_can_visit_role_show_page()
    // {
    //     $role = $this->roleCreate();

    //     $response = $this->actingAs($this->admin)->get(route('admin.roles.show',$role->id));

    //     $response->assertOk();
    //     $response->assertViewHas('role', $role);
    // }


    public function test_admin_can_visit_role_edit_page()
    {
        $role = $this->roleCreate();

        $response = $this->actingAs($this->admin)->get(route('admin.roles.edit',$role->id));

        $response->assertOk();
        $response->assertViewHas('role', $role);
    }


    public function test_admin_can_update_role()
    {
        $roleData = $this->roleData();
        $role = $this->roleCreate();

        $response = $this->actingAs($this->admin)->put(route('admin.roles.update',$role->id),$roleData);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.roles.index'));
        $this->assertDatabaseHas('roles', [array_keys($roleData)[0] => $roleData[array_keys($roleData)[0]]]);
    }


    public function test_admin_can_delete_role()
    {
        $role = $this->roleCreate();

        $response = $this->actingAs($this->admin)->delete(route('admin.roles.destroy',$role->id));

        $response->assertOk();
        $this->assertDatabaseMissing('roles',['id'=>$role->id]);
    }


 // No permission admin

    public function test_no_permission_admin_cannot_access_role_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.roles.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_role_create_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.roles.create'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_role_edit_page()
    {
        $role = $this->roleCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.roles.edit',$role->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    // public function test_no_permission_admin_cannot_access_role_show_page()
    // {
    //     $role = $this->roleCreate();

    //     $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.roles.show',$role->id));

    //     $response->assertStatus(Response::HTTP_FORBIDDEN);
    // }


    public function test_no_permission_admin_cannot_store_role()
    {
        $roleData = $this->roleData();

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.roles.store'),$roleData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_update_role()
    {
        $roleData = $this->roleData();
        $role = $this->roleCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.roles.update',$role->id),$roleData);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_delete_role()
    {
        $role = $this->roleCreate();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.roles.destroy',$role->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


}
