<?php

use App\Models\FrontendContent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_contents', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->text('value')->nullable();
            $table->timestamps();
        });

        FrontendContent::create(['key'=>'footer_text','value'=>'Copyright @ P']);
        FrontendContent::create(['key'=>'email','value'=>'mail@demo.com']);
        FrontendContent::create(['key'=>'phone','value'=>'+880 16210 92 630']);
        FrontendContent::create(['key'=>'address','value'=>'Dhaka, Bangladesh']);

        FrontendContent::create(['key'=>'facebook','value'=>'https://facebook.com']);
        FrontendContent::create(['key'=>'twitter','value'=>'https://twitter.com']);
        FrontendContent::create(['key'=>'linkedin','value'=>'https://linkedin.com']);
        FrontendContent::create(['key'=>'youtube','value'=>'https://youtube.com']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_contents');
    }
}
