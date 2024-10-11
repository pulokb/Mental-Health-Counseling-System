<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateNewTest2sTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_test2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'NewTest2',
                'permissions' => [
                    // NewTest2 Permissions
                    ['name'=>'NewTest2-view','route'=>route('admin.newTest2s.index'),'search_status'=>1],
                    ['name'=>'NewTest2-create','route'=>route('admin.newTest2s.create'),'search_status'=>1],
                    ['name'=>'NewTest2-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'NewTest2-delete','route'=>NULL,'search_status'=>0],
                ]
            ],
        ];

        (new AdminHelper())->addPermission("admin",$adminPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_test2s');
    }
}
