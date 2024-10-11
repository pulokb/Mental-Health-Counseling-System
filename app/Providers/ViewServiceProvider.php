<?php

namespace App\Providers;
use App\Models\Admin;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.twenty_sixes.fields'], function ($view) {
            $adminItems = Admin::pluck('name','id')->toArray();
            $view->with('adminItems', $adminItems);
        });
        View::composer(['admin.admins.fields'], function ($view) {
            $roles = Role::where('name','!=','super-admin')->where('name','!=','user')->get();
            $view->with('roles', $roles);
        });
        //
    }
}
