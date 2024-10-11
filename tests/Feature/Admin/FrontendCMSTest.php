<?php

namespace Tests\Feature\Admin;

use App\Models\FrontendPage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class FrontendCMSTest extends TestCase
{
    use FastRefreshDatabase;


    public function test_admin_can_access_frontend_cms_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.frontendCMS.page'));

        $response->assertOk();
    }


    public function test_admin_can_access_frontend_cms_edit_page()
    {
        $frontendPage = FrontendPage::find(1);

        $response = $this->actingAs($this->admin)->get(route('admin.frontendCMS.pageEdit',$frontendPage->id));

        $response->assertViewHas('frontendPage',$frontendPage);
        $response->assertSeeText($frontendPage->content);
    }


    public function test_admin_can_update_frontend_cms_page()
    {
        $frontendPage = FrontendPage::find(1);

        $response = $this->actingAs($this->admin)->post(route('admin.frontendCMS.pageUpdate',$frontendPage->id),['content' => 'dummy content']);

        $response->assertRedirect(route('admin.frontendCMS.page'));
        $this->assertDatabaseHas('frontend_pages',['id' => $frontendPage->id,'content' => 'dummy content']);
    }


    public function test_admin_can_access_content_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.frontendCMS.content'));

        $response->assertSeeText('content');
    }


    public function test_admin_can_update_content_page()
    {
        $data = ['email' => 'dummy@email.com'];

        $response = $this->actingAs($this->admin)->post(route('admin.frontendCMS.contentUpdate'),$data);

        $this->assertDatabaseHas('frontend_contents',['value' => 'dummy@email.com']);
    }

}
