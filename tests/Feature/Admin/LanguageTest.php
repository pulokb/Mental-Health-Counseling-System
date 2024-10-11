<?php

namespace Tests\Feature\Admin;

use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_language_list_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.languages.index'));

        $response->assertOk();
    }


    public function test_admin_can_access_language_create_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.languages.create'));

        $response->assertOk();
    }


    public function test_admin_can_create_language()
    {
        $data = ['name' => 'DummyData', 'code' => 'dd', 'status' => 1];

        File::copy(resource_path('lang/en.json'), resource_path('lang/dd.json'));
        $response = $this->actingAs($this->admin)->post(route('admin.languages.store', $data));

        $response->assertValid();
        $this->assertDatabaseHas('languages', ['code' => 'dd']);
        $response->assertRedirect(route('admin.languages.index'));

        File::delete(resource_path('lang/dd.json'));
    }


    public function test_admin_can_show_a_single_language()
    {
        $language = Language::find(1);

        $response = $this->actingAs($this->admin)->get(route('admin.languages.show',$language->id));

        $response->assertOk();
        $response->assertSeeText($language->name,false);
    }


    public function test_admin_can_visit_the_edit_page()
    {
        $language = Language::find(2);

        $response = $this->actingAs($this->admin)->get(route('admin.languages.edit',$language->id));

        $response->assertOk();
        $response->assertSeeText($language->name,false);
    }


    public function test_admin_cannot_delete_default_language()
    {
        $language = Language::find(1);

        $response = $this->actingAs($this->admin)->delete(route('admin.languages.destroy',$language->id));

        $response->assertStatus(400);
    }


    public function test_admin_can_visit_translate_page()
    {
        $language = Language::find(2);

        $response = $this->actingAs($this->admin)->get(route('admin.languages.translatePage',$language->id));

        $response->assertOk();

    }

}
