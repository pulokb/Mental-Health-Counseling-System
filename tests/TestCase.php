<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public User $admin;
    public User $user;
    public User $noPermissionAdmin;


    public function setUp(): void
    {
        parent::setUp();
        $this->admin = $this->createAdmin();
        $this->user = $this->createUser();
        $this->noPermissionAdmin = $this->createNoPermissionAdmin();
    }


    public function createAdmin()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        return $admin;
    }

    public function createUser()
    {
        $user = User::factory()->create();
        $user->assignRole('user');
        return $user;
    }

    public function createNoPermissionAdmin()
    {
        $noPermissionAdmin = User::factory()->create();
        $newRole = Role::create(['name' => 'new-role']);

        // $newRole->givePermissionTo('user-view');
        // $newRole->givePermissionTo('user-create');
        // $noPermissionAdmin->assignRole('admin');

        $noPermissionAdmin->assignRole('new-role');
        return $noPermissionAdmin;
    }
}
