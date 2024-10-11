<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\AdminHelper;

class CreateDoctorFeedbacksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_name');   // Add user_name
            $table->integer('age');        // Add age field
            $table->string('gender');      // Add gender field
            $table->string('occupation');  // Add occupation field
            $table->integer('overall_result');  // Add overall_result field
            $table->string('status');
            $table->integer('educational');     // Add educational field
            $table->integer('family');          // Add family field
            $table->integer('relationship');    // Add relationship field
            $table->integer('job');             // Add job field
            $table->integer('general');         // Add general field
            $table->text('message')->nullable(); // Add message field (nullable)
            $table->text('symptoms')->nullable();
            $table->text('suggestions')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });

        // Add admin permissions for the DoctorFeedback model
        $adminPermissions = [
            [
                'group_name' => 'DoctorFeedback',
                'permissions' => [
                    // DoctorFeedback Permissions
                    ['name' => 'DoctorFeedback-view', 'route' => route('admin.doctorFeedbacks.index'), 'search_status' => 1],
                    ['name' => 'DoctorFeedback-create', 'route' => route('admin.doctorFeedbacks.create'), 'search_status' => 1],
                    ['name' => 'DoctorFeedback-update', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'DoctorFeedback-delete', 'route' => NULL, 'search_status' => 0],
                ]
            ],
        ];

        // Use helper to add permissions to the admin role
        (new AdminHelper())->addPermission("admin", $adminPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_feedbacks');
    }
}
