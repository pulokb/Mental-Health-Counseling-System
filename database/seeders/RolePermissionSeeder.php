<?php

namespace Database\Seeders;

use App\Helpers\AdminHelper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminNewPermissions = [

            [
                'group_name' => 'NewTest',
                'permissions' => [
                    // NewTest Permissions
                    ['name'=>'NewTest-view','route'=>route('admin.newTests.index'),'search_status'=>1],
                    ['name'=>'NewTest-create','route'=>route('admin.newTests.create'),'search_status'=>1],
                    ['name'=>'NewTest-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'NewTest-delete','route'=>NULL,'search_status'=>0],
                ]
            ],
        ];

        (new AdminHelper())->addPermission("admin",$adminNewPermissions);

    }
}
