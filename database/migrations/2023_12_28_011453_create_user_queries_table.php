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
        $table->string('depression_q1')->nullable();
        $table->string('depression_q2')->nullable();
        $table->string('depression_q3')->nullable();
        $table->string('anxiety_q1')->nullable();
        $table->string('anxiety_q2')->nullable();
        $table->string('anxiety_q3')->nullable();
        $table->string('irritability_q1')->nullable();
        $table->string('irritability_q2')->nullable();
        $table->string('irritability_q3')->nullable();
        $table->string('emotional_q1')->nullable();
        $table->string('emotional_q2')->nullable();
        $table->string('emotional_q3')->nullable();
        $table->string('social_q1')->nullable();
        $table->string('social_q2')->nullable();
        $table->string('social_q3')->nullable();
        $table->string('fatigue_q1')->nullable();
        $table->string('fatigue_q2')->nullable();
        $table->string('fatigue_q3')->nullable();
        $table->string('concentrating_q1')->nullable();
        $table->string('concentrating_q2')->nullable();
        $table->string('concentrating_q3')->nullable();
        $table->string('sleep_q1')->nullable();
        $table->string('sleep_q2')->nullable();
        $table->string('sleep_q3')->nullable();
        $table->string('esteem_q1')->nullable();
        $table->string('esteem_q2')->nullable();
        $table->string('esteem_q3')->nullable();
        $table->string('panic_q1')->nullable();
        $table->string('panic_q2')->nullable();
        $table->string('panic_q3')->nullable();
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
