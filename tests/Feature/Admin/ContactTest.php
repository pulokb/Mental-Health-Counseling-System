<?php

namespace Tests\Feature\Admin;

use App\Models\ContactFeedback;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;


    public function test_admin_can_visit_contacts_list_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.contacts'));

        $response->assertOk();
    }


    public function test_admin_can_view_single_contact()
    {
        $contactFeedback = ContactFeedback::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('admin.contactFeedback.show', $contactFeedback->id));

        $response->assertOk();
        $response->assertViewHas('contactFeedback', $contactFeedback);
        $response->assertSeeText($contactFeedback->email);
    }

    public function test_admin_can_delete_contact()
    {
        $contactFeedback = ContactFeedback::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.contactFeedback.delete', $contactFeedback->id));

        $response->assertOk();
    }


    public function test_no_permission_admin_cannot_visit_contact_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.contacts'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_view_single_contact()
    {
        $contactFeedback = ContactFeedback::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.contactFeedback.show', $contactFeedback->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_delete_contact()
    {
        $contactFeedback = ContactFeedback::factory()->create();

        $response = $this->actingAs($this->noPermissionAdmin)->delete(route('admin.contactFeedback.delete', $contactFeedback->id));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }



}
