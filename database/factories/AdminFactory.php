<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $nameIntervals = -1;
        static $emailIntervals = -1;
        static $adminIntervals = -1;
        $name = ["Super Admin", "Default Admin"];
        $email = ["admin@admin.com", "default@admin.com"];
        $adminStatus = [1, 0];
        return  [
            'name' => $name[++$nameIntervals],
            'email' => $email[++$emailIntervals],
            'super_admin' => $adminStatus[++$adminIntervals],
            'password' => bcrypt(456456456),
            // 'last_login_ip' => $this->faker->ipAdd
            'remember_token' => Str::random(10),
        ];
    }
}
