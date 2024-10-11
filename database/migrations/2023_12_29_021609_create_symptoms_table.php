<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateSymptomsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('details');
            $table->string('image');
            $table->text('note');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'Symptoms',
                'permissions' => [
                    // Symptoms Permissions
                    ['name'=>'Symptoms-view','route'=>route('admin.symptoms.index'),'search_status'=>1],
                    ['name'=>'Symptoms-create','route'=>route('admin.symptoms.create'),'search_status'=>1],
                    ['name'=>'Symptoms-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Symptoms-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('symptoms');
    }
}
