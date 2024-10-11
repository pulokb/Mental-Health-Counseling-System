<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateSuggestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('details');
            $table->string('image');
            $table->text('note');
            $table->timestamps();
        });

        $adminPermissions = [

            [
                'group_name' => 'Suggestions',
                'permissions' => [
                    // Suggestions Permissions
                    ['name'=>'Suggestions-view','route'=>route('admin.suggestions.index'),'search_status'=>1],
                    ['name'=>'Suggestions-create','route'=>route('admin.suggestions.create'),'search_status'=>1],
                    ['name'=>'Suggestions-update','route'=>NULL,'search_status'=>0],
                    ['name'=>'Suggestions-delete','route'=>NULL,'search_status'=>0],
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
        Schema::drop('suggestions');
    }
}
