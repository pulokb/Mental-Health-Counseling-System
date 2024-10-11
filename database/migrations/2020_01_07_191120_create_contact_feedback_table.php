<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');              // Name of the person giving feedback
            $table->string('email');             // Email of the person giving feedback
            $table->string('phone')->nullable(); // Phone number is optional
            $table->text('message');             // Message content
            $table->timestamps();                // Timestamps for created and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_feedback');
    }
}
