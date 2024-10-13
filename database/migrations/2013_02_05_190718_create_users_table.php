<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use Str;
class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('occupation')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(1);
            $table->string('provider')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });


        User::create(
            [
                'name' => 'Super Admin Pulok',
                'email' => 'pulok@mindquilo.com',
                'password' => bcrypt('456456456'),
                'phone' => '01793651750',
                'address' => 'Dhaka Bangladesh',
                'age' => '26',
                'gender' => 'Male',
                'occupation' => 'Super Admin',
                'image' => 'admin.jpg',
                'email_verified_at' => now(),
                'remember_token' => rand(100,1000000),
            ]
        );
        User::create(
            [
                'name' => 'Admin Pulok',
                'email' => 'admin@mindquilo.com',
                'password' => bcrypt('456456456'),
                'phone' => '01793651750',
                'address' => 'Dhaka Bangladesh',
                'age' => '26',
                'gender' => 'Male',
                'occupation' => 'Admin',
                'image' => 'admin.jpg',
                'email_verified_at' => now(),
                'remember_token' => rand(100,1000000),
            ]
        );

        User::create(
            [
                'name' => 'Doctor Pulok',
                'email' => 'doctor@mindquilo.com',
                'password' => bcrypt('12345678'),
                'phone' => '01793651750',
                'address' => 'Dhaka Bangladesh',
                'age' => '26',
                'gender' => 'Male',
                'occupation' => 'Doctor',
                'image' => 'user.jpg',
                'email_verified_at' => now(),
                'remember_token' => rand(100,1000000),
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
