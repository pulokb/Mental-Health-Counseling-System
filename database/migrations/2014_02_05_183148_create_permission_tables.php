<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');
        $teams = config('permission.teams');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }
        if ($teams && empty($columnNames['team_foreign_key'] ?? null)) {
            throw new \Exception('Error: team_foreign_key on config/permission.php not loaded. Run [php artisan config:clear] and try again.');
        }

        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->string('group_name')->nullable();
            $table->string('route')->nullable();
            $table->string('search_status')->nullable();
            $table->timestamps();

            $table->unique(['name', 'guard_name']);
        });

        Schema::create($tableNames['roles'], function (Blueprint $table) use ($teams, $columnNames) {
            $table->bigIncrements('id');
            if ($teams || config('permission.testing')) { // permission.testing is a fix for sqlite testing
                $table->unsignedBigInteger($columnNames['team_foreign_key'])->nullable();
                $table->index($columnNames['team_foreign_key'], 'roles_team_foreign_key_index');
            }
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name'); // For MySQL 8.0 use string('guard_name', 125);
            $table->string('description')->nullable();
            $table->timestamps();
            if ($teams || config('permission.testing')) {
                $table->unique([$columnNames['team_foreign_key'], 'name', 'guard_name']);
            } else {
                $table->unique(['name', 'guard_name']);
            }
        });

        Schema::create($tableNames['model_has_permissions'], function (Blueprint $table) use ($tableNames, $columnNames, $teams) {
            $table->unsignedBigInteger(PermissionRegistrar::$pivotPermission);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_permissions_model_id_model_type_index');

            $table->foreign(PermissionRegistrar::$pivotPermission)
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_permissions_team_foreign_key_index');

                $table->primary(
                    [$columnNames['team_foreign_key'], PermissionRegistrar::$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary'
                );
            } else {
                $table->primary(
                    [PermissionRegistrar::$pivotPermission, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary'
                );
            }
        });

        Schema::create($tableNames['model_has_roles'], function (Blueprint $table) use ($tableNames, $columnNames, $teams) {
            $table->unsignedBigInteger(PermissionRegistrar::$pivotRole);

            $table->string('model_type');
            $table->unsignedBigInteger($columnNames['model_morph_key']);
            $table->index([$columnNames['model_morph_key'], 'model_type'], 'model_has_roles_model_id_model_type_index');

            $table->foreign(PermissionRegistrar::$pivotRole)
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');
            if ($teams) {
                $table->unsignedBigInteger($columnNames['team_foreign_key']);
                $table->index($columnNames['team_foreign_key'], 'model_has_roles_team_foreign_key_index');

                $table->primary(
                    [$columnNames['team_foreign_key'], PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary'
                );
            } else {
                $table->primary(
                    [PermissionRegistrar::$pivotRole, $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary'
                );
            }
        });

        Schema::create($tableNames['role_has_permissions'], function (Blueprint $table) use ($tableNames) {
            $table->unsignedBigInteger(PermissionRegistrar::$pivotPermission);
            $table->unsignedBigInteger(PermissionRegistrar::$pivotRole);

            $table->foreign(PermissionRegistrar::$pivotPermission)
                ->references('id')
                ->on($tableNames['permissions'])
                ->onDelete('cascade');

            $table->foreign(PermissionRegistrar::$pivotRole)
                ->references('id')
                ->on($tableNames['roles'])
                ->onDelete('cascade');

            $table->primary([PermissionRegistrar::$pivotPermission, PermissionRegistrar::$pivotRole], 'role_has_permissions_permission_id_role_id_primary');
        });

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));



        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleAdmin = Role::create(['name' => 'admin', 'description' => 'Admin can access everything.']);
        $roleStaff = Role::create(['name' => 'Doctor', 'description' => 'Doctor can access specific things.']);


        // Permission List as array
        $adminPermissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    //  'dashboard-view',
                    ['name' => 'dashboard-view', 'route' => route('admin.dashboard'), 'search_status' => 1],
                ]
            ],
            // [
            //     'group_name' => 'user',
            //     'permissions' => [
            //         // user Permissions
            //         ['name' => 'user-create', 'route' => route('admin.users.create'), 'search_status' => 1],
            //         ['name' => 'user-view', 'route' => route('admin.users.index'), 'search_status' => 1],
            //         ['name' => 'user-update', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'user-delete', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'user-login', 'route' => NULL, 'search_status' => 0],
            //     ]
            // ],
            [
                'group_name' => 'system-administrator',
                'permissions' => [
                    // user Permissions
                    ['name' => 'admin-create', 'route' => route('admin.admins.create'), 'search_status' => 1],
                    ['name' => 'admin-view', 'route' => route('admin.admins.index'), 'search_status' => 1],
                    ['name' => 'admin-update', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'admin-delete', 'route' => NULL, 'search_status' => 0],
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    ['name' => 'role-create', 'route' => route('admin.roles.create'), 'search_status' => 1],
                    ['name' => 'role-update', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'role-delete', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'role-view', 'route' => route('admin.roles.index'), 'search_status' => 1],
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    ['name' => 'change-password', 'route' => route('admin.change.password.view'), 'search_status' => 1],
                ]
            ],
            [
                'group_name' => 'setting',
                'permissions' => [
                    // profile Permissions
                    // ['name' => 'backup', 'route' => route('admin.backups.index'), 'search_status' => 1],
                    ['name' => 'setting-view', 'route' => route('admin.settings.index'), 'search_status' => 1],
                    ['name' => 'setting-update', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'maintenance-mode', 'route' => route('admin.maintenanceMode'), 'search_status' => 1],
                ]
            ],
            // [
            //     'group_name' => 'others',
            //     'permissions' => [
            //         // profile Permissions
            //         ['name' => 'contact-view', 'route' => route('admin.contacts'), 'search_status' => 1],
            //         ['name' => 'feedback-view', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'contact-feedback-delete', 'route' => NULL, 'search_status' => 0],
            //     ]
            // ],
            [
                'group_name' => 'log-activity',
                'permissions' => [
                    ['name' => 'log-activity-view', 'route' => route('admin.userLoginActivity'), 'search_status' => 1],
                    ['name' => 'log-activity-delete', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'log-activity-configure', 'route' => NULL, 'search_status' => 0],
                ]
            ],
            // [
            //     'group_name' => 'Language',
            //     'permissions' => [
            //         // Language Permissions
            //         ['name' => 'Language-create', 'route' => route('admin.languages.create'), 'search_status' => 1],
            //         ['name' => 'Language-view', 'route' => route('admin.languages.index'), 'search_status' => 1],
            //         ['name' => 'Language-update', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'Language-delete', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'Language-translate', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'Language-set-default', 'route' => NULL, 'search_status' => 0],
            //     ]
            // ],
            // [
            //     'group_name' => 'Frontend CMS',
            //     'permissions' => [
            //         ['name' => 'Page-view', 'route' => route('admin.frontendCMS.page'), 'search_status' => 1],
            //         ['name' => 'Page-update', 'route' => NULL, 'search_status' => 0],
            //         ['name' => 'Content-view', 'route' => route('admin.frontendCMS.content'), 'search_status' => 1],
            //         ['name' => 'Content-update', 'route' => NULL, 'search_status' => 0],
            //     ]
            // ],
            [
                'group_name' => 'Visitor',
                'permissions' => [
                    ['name' => 'Visitor-info', 'route' => route('admin.visitorInfo'), 'search_status' => 1],
                    ['name' => 'Visitor-info-delete', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'Visitor-block-list', 'route' => route('admin.visitorBlockList'), 'search_status' => 1],
                    ['name' => 'Visitor-block-create', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'Visitor-block-remove', 'route' => NULL, 'search_status' => 0],
                ]
            ],
            [
                'group_name' => 'notification',
                'permissions' => [
                    ['name' => 'Notification-view', 'route' => route('admin.notifications.index'), 'search_status' => 1],
                    ['name' => 'Notification-delete', 'route' => NULL, 'search_status' => 0],
                    ['name' => 'Notification-mark-read', 'route' => NULL, 'search_status' => 0],
                ]
            ],
            // Use seeder for new permission
            //  [
            //     'group_name' => 'LastTest',
            //     'permissions' => [
            //         // LastTest Permissions
            //         ['name'=>'LastTest-view','route'=>route('admin.lastTests.index'),'search_status'=>1],
            //         ['name'=>'LastTest-create','route'=>route('admin.lastTests.create'),'search_status'=>1],
            //         ['name'=>'LastTest-updat0','route'=>NULL,'search_status'=>0],
            //         ['name'=>'LastTest-delete','route'=>NULL,'search_status'=>0],
            //     ]
            // ],
        ];




        $staffPermissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard-view',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'change-password',
                ]
            ],
            [
                'group_name' => 'notification',
                'permissions' => [
                   'Notification-view',
                    'Notification-delete',
                    'Notification-mark-read',
                ]
            ],
            // [
            //     'group_name' => 'Language',
            //     'permissions' => [
            //         // Language Permissions
            //         'Language-view',
            //         'Language-update',
            //         'Language-translate',
            //         'Language-set-default',
            //     ]
            // ],


        ];



        //  Super admin will permit all from authServiceProvider Gate

        // Admin Permission
        foreach ($adminPermissions as $adminPermission) {
            foreach ($adminPermission['permissions'] as $permission) {
                $permissionForAdmin = Permission::updateOrCreate(
                    [
                        'name' => $permission['name'],
                        'route' => $permission['route'],
                        'search_status' => $permission['search_status'],
                        'group_name' => $adminPermission['group_name']
                    ]
                );
                $roleAdmin->givePermissionTo($permissionForAdmin);
            }
        }

        // Staff Permission

        foreach ($staffPermissions as $staffPermission) {
            foreach ($staffPermission['permissions'] as $permission) {
                $permissionForStaff = Permission::updateOrCreate(
                    [
                        'name' => $permission,
                    ]
                );
                $roleStaff->givePermissionTo($permissionForStaff);
            }
        }



        $superAdmin = User::first();
        $superAdmin->assignRole('super-admin');
        $admin = User::find(2);
        $admin->assignRole('admin');
        $staff = User::find(3);
        $staff->assignRole('doctor');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
