<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersPermissions = [
            'all' => Permission::firstOrCreate(['name' => 'users']),
            'update' => Permission::firstOrCreate(['name' => 'users.update']),
            'delete' => Permission::firstOrCreate(['name' => 'users.delete']),
            'view' => Permission::firstOrCreate(['name' => 'users.view']),
        ];

        $permissionsPermissions = [
            'all' => Permission::firstOrCreate(['name' => 'permissions']),
            'update' => Permission::firstOrCreate(['name' => 'permissions.update']),
            'delete' => Permission::firstOrCreate(['name' => 'permissions.delete']),
            'view' => Permission::firstOrCreate(['name' => 'permissions.view']),
        ];

        $expertsPermissions = [
            'all' => Permission::firstOrCreate(['name' => 'experts']),
            'create' => Permission::firstOrCreate(['name' => 'experts.create']),
            'update' => Permission::firstOrCreate(['name' => 'experts.update']),
            'delete' => Permission::firstOrCreate(['name' => 'experts.delete']),
            'view' => Permission::firstOrCreate(['name' => 'experts.view']),
        ];


        $userRole = Role::firstOrCreate(['name' => \App\Models\Role::USER_ROLE]);
        $userRole->givePermissionTo(
            $usersPermissions['view']
        );

        $expertRole = Role::firstOrCreate(['name' => \App\Models\Role::EXPERT_ROLE]);
        $expertRole->givePermissionTo(
            $expertsPermissions['all']
        );

        $adminRole = Role::firstOrCreate(['name' => \App\Models\Role::ADMIN_ROLE]);
        $adminRole->givePermissionTo(
            $usersPermissions['all'],
            $permissionsPermissions['all'],
            $expertsPermissions['all'],
        );

    }
}
