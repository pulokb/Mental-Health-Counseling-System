<?php

namespace Tests\Feature\Admin;

use App\Models\VisitorInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Plannr\Laravel\FastRefreshDatabase\Traits\FastRefreshDatabase;
use Tests\TestCase;

class VisitorInfoTest extends TestCase
{
    use FastRefreshDatabase;


    public function test_admin_can_access_visitor_info_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.visitorInfo'));

        $response->assertOk();
    }


    public function test_admin_can_delete_visitor_info()
    {

        $visitorInfo = VisitorInfo::factory()->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.visitorInfoDelete',$visitorInfo->id));

        $response->assertOk();
        $this->assertDatabaseMissing('visitor_infos',['id'=>$visitorInfo->id]);
    }


    public function test_admin_can_delete_all_visitor_info()
    {

        $visitorInfo = VisitorInfo::factory(5)->create();

        $response = $this->actingAs($this->admin)->delete(route('admin.visitorInfoDeleteAll'));

        $response->assertRedirect();
        $this->assertDatabaseMissing('visitor_infos',['id'=>$visitorInfo[0]->id]);
    }


    public function test_admin_can_access_visitor_block_list_page()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.visitorBlockList'));

        $response->assertOk();
    }


    public function test_admin_can_add_visitor_to_block_list()
    {
        $response = $this->actingAs($this->admin)->post(route('admin.visitorIpBlock',['ip_address' => '192.168.0.1']));

        $response->assertRedirect();
        $this->assertDatabaseHas('visitor_infos',['ip_address' => '192.168.0.1','status' => 0]);
    }


    public function test_admin_can_remove_visitor_from_black_list()
    {

        $visitorInfo = VisitorInfo::factory()->create();

        $response = $this->actingAs($this->admin)->get(route('admin.visitorRemoveFromBlockList',$visitorInfo->id));

        $response->assertRedirect();
        $this->assertDatabaseHas('visitor_infos',['ip_address' => $visitorInfo->ip_address,'status' => 1]);
    }

    public function test_admin_can_remove_all_visitor_from_black_list()
    {

        $visitorInfo = VisitorInfo::factory(3)->create();

        $response = $this->actingAs($this->admin)->post(route('admin.visitorRemoveFromBlockListAll'));

        $response->assertRedirect();
        $this->assertDatabaseHas('visitor_infos',['ip_address' => $visitorInfo[0]->ip_address,'status' => 1]);
    }

    //no permission admin

    public function test_no_permission_admin_cannot_access_visitor_info_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.visitorInfo'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }


    public function test_no_permission_admin_cannot_access_visitor_block_list_page()
    {
        $response = $this->actingAs($this->noPermissionAdmin)->get(route('admin.visitorBlockList'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }



}
