<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateUserQueriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('user_queries', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->string('student_q1')->nullable();
        $table->string('student_q2')->nullable();
        $table->string('student_q3')->nullable();
        $table->string('student_q4')->nullable();
        $table->string('student_q5')->nullable();
        $table->string('family_q1')->nullable();
        $table->string('family_q2')->nullable();
        $table->string('family_q3')->nullable();
        $table->string('family_q4')->nullable();
        $table->string('family_q5')->nullable();
        $table->string('relationship_q1')->nullable();
        $table->string('relationship_q2')->nullable();
        $table->string('relationship_q3')->nullable();
        $table->string('relationship_q4')->nullable();
        $table->string('relationship_q5')->nullable();
        $table->string('job_q1')->nullable();
        $table->string('job_q2')->nullable();
        $table->string('job_q3')->nullable();
        $table->string('job_q4')->nullable();
        $table->string('job_q5')->nullable();
        $table->string('mental_health_q1')->nullable();
        $table->string('mental_health_q2')->nullable();
        $table->string('mental_health_q3')->nullable();
        $table->string('mental_health_q4')->nullable();
        $table->string('mental_health_q5')->nullable();
        $table->timestamps();
    });

        $adminPermissions = [

            [
                'group_name' => 'UserQuery',
                'permissions' => [
                    // UserQuery Permissions
                    ['name'=>'UserQuery-view','route'=>route('admin.userQueries.index'),'search_status'=>1],
                    ['name'=>'UserQuery-create','route'=>route('admin.userQueries.create'),'search_status'=>1],
                    ['name'=>'UserQuery-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'UserQuery-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('user_queries');
    }
}
