<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;


    public function test_admin_can_visit_users_list_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertViewHas('users', function ($collection) use ($user) {
            return $collection->contains($user);
        });
    }


    public function test_no_permission_admin_cannot_visit_users_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.users.index'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function test_admin_can_view_single_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('admin.users.show',$user->id));

        $response->assertOk();
        $response->assertViewHas('user', $user);
        $response->assertSeeText($user->email);
    }

    public function test_no_permission_admin_cannot_view_single_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.users.show',$user->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_admin_can_see_create_users_button()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.users.index'));
        $response->assertSeeText('Create New Users');
    }


    public function test_no_permission_admin_cannot_see_create_users_button()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.users.index'));
        $response->assertDontSee('Create New Users');
    }


    public function test_no_permission_admin_cannot_visit_create_users_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.users.create'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_admin_can_create_new_user()
    {
        $data = ['name' => 'Dummy name', 'email' => 'dummy@email.com', 'password' => '12345678'];

        $response = $this->actingAs($this->admin)->post(route('admin.users.store', $data));

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseHas('users', ['name' => 'Dummy name']);
        // $this->assertDatabaseHas('users', $data);

        $latestUser = User::orderBy('id', 'desc')->first();
        $this->assertEquals($data['name'], $latestUser->name);
        $this->assertEquals($data['email'], $latestUser->email);
    }


    public function test_no_permission_admin_cannot_create_user()
    {
        $data = ['name' => 'Dummy name', 'email' => 'dummy@email.com', 'password' => '12345678'];
        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.users.store', $data));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_admin_can_visit_edit_users_page_and_see_correct_values()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('admin.users.edit', $user->id));

        $response->assertOk();
        $response->assertSee('value="' . $user->name . '"', false);
        $response->assertViewHas('user', $user);
    }


    public function test_no_permission_admin_cannot_visit_user_edit_page()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.users.edit', $user->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_validation_error_on_update_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->put(route('admin.users.update', $user->id), ['name' => '', 'email' => 'admin@admin.com']);

        $response->assertStatus(302);
        $response->assertInvalid(['name', 'email']);
    }


    public function test_admin_can_update_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->put(route('admin.users.update', $user->id), ['name' => 'New name']);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['name' => 'New name']);

        $latestUser = User::orderBy('id', 'desc')->first();
        $this->assertEquals('New name', $latestUser->name);
    }


    public function test_no_permission_admin_cannot_update_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->put(route('admin.users.update', $user->id), ['name' => 'New name']);

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_admin_can_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.users.destroy', $user->id));

        $response->assertOk();
    }


    public function test_no_permission_admin_cannot_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.users.destroy', $user->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_admin_can_login_to_user_account()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('admin.users.loginAsUser', $user->id));

        $response->assertStatus(302);
        $response->assertRedirect(route('index'));
    }


    public function test_no_permission_admin_cannot_login_to_user_account()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.users.loginAsUser', $user->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }
}
