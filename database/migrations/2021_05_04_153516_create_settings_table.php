<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('value')->nullable();
            $table->timestamps();
        });


        Setting::updateOrCreate(['name' => 'site_title', 'value' => 'Site Name']);
        Setting::updateOrCreate(['name' => 'site_description', 'value' => 'Demo Description']);
        Setting::updateOrCreate(['name' => 'site_logo', 'value' => '']);
        Setting::updateOrCreate(['name' => 'site_favicon', 'value' => '']);
        Setting::updateOrCreate(['name' => 'admin_logo', 'value' => '']);
        Setting::updateOrCreate(['name' => 'admin_header_color', 'value' => 'bg-asteroid header-text-light']);
        Setting::updateOrCreate(['name' => 'admin_sidebar_color', 'value' => 'bg-asteroid sidebar-text-light']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
