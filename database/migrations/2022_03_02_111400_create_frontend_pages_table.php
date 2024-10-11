<?php

use App\Models\FrontendPage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable();
            $table->timestamps();
        });

        FrontendPage::create(['name'=>'about','content'=>'<p>This is about page content</p>']);
        FrontendPage::create(['name'=>'terms_and_condition','content'=>'<p>This is terms and condition page content</p>']);
        FrontendPage::create(['name'=>'privacy_policy','content'=>'<p>This is privacy_policy page content</p>']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frontend_pages');
    }
}
