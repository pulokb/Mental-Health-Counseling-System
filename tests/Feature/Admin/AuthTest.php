<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    use RefreshDatabase;
    public function test_login_page_visit()
    {
        $response = $this->get(route('admin.login'));

        $response->assertOk();
    }

    public function test_login()
    {
        $data = ['email' => 'admin@admin.com','password'=>456456456];

        $response = $this->post(route('login',$data));

        $response->assertRedirect(route('admin.dashboard'));
    }


}
