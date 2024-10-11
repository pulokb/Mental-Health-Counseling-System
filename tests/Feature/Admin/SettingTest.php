<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_visit_setting_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.settings.index'));
        $response->assertOk();
    }


    public function test_admin_can_update_setting()
    {
        $data = ['site_title' => 'Dummy data', 'site_description' => 'Dummy data'];

        $response = $this->actingAs($this->admin)->post(route('admin.settings.updateAll', $data));

        $response->assertValid();
        $response->assertRedirect(route('admin.settings.index'));
    }


    public function test_admin_can_visit_email_setting_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.settings.updateEmailSettingView'));

        $response->assertOk();

    }


    public function test_admin_can_update_email_setting()
    {
        $data = [
            'mail_mailer' => 'smtp',
            'mail_host' => 'smtp.mailtrap.io',
            'mail_port' => '2525',
            'mail_username' => '0ad37926b70504',
            'mail_password' => '13e97dfd05d65f',
            'mail_encryption' => 'TLS',
            'mail_from_address' => 'admin@admin.com',
            'mail_from_name' => 'Ratul',
        ];

        $response = $this->actingAs($this->admin)->from(route('admin.settings.updateEmailSettingView'))->post(route('admin.settings.updateEmailSetting', $data));

        $response->assertValid();

        $response->assertStatus(Response::HTTP_FOUND);
    }


    public function test_admin_can_send_email()
    {
        $data = ['to'=>'touhedulislam46@gmail.com', 'subject' => 'Email testing','body' => 'This is a testing'];

        $response = $this->actingAs($this->admin)->from(route('admin.settings.updateEmailSettingView'))->post(route('admin.settings.sendMail',$data));

        $response->assertValid();
        $response->assertRedirect(route('admin.settings.updateEmailSettingView'));
    }


    public function test_admin_can_send_test_email()
    {
        $data = ['to'=>'touhedulislam46@gmail.com'];

        $response = $this->actingAs($this->admin)->from(route('admin.settings.updateEmailSettingView'))->post(route('admin.settings.sendTestMail',$data));

        $response->assertValid();
        $response->assertRedirect(route('admin.settings.updateEmailSettingView'));
    }


    public function test_no_permission_admin_cannot_update_setting()
    {
        $data = ['site_title' => 'Dummy data', 'site_description' => 'Dummy data'];

        $response = $this->actingAs($this->noPermissionAdmin)->post(route('admin.settings.updateAll', $data));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    

}
