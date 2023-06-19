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
            'view-plants' => Permission::firstOrCreate(['name' => 'users.view-plants']),
            'view-myplants' => Permission::firstOrCreate(['name' => 'users.view-myplants']),
            'view-mylaw' => Permission::firstOrCreate(['name' => 'users.view-mylaw']),
            'view-advice' => Permission::firstOrCreate(['name' => 'users.view-advice']),
            'view-rooms' => Permission::firstOrCreate(['name' => 'users.view-rooms']),
            'create-room' => Permission::firstOrCreate(['name' => 'users.create-room']),
            'create-law' => Permission::firstOrCreate(['name' => 'users.create-law']),
            'create-myplant' => Permission::firstOrCreate(['name' => 'users.create-myplant']),
            'create-remind' => Permission::firstOrCreate(['name' => 'users.create-remind']),
            'update-room' => Permission::firstOrCreate(['name' => 'users.update-room']),
            'update-myplant' => Permission::firstOrCreate(['name' => 'users.update-myplant']),
            'update-user-profile' => Permission::firstOrCreate(['name' => 'users.update-user-profile']),
            'delete-myplant' => Permission::firstOrCreate(['name' => 'users.delete-myplant']),
        ];

        $permissionsPermissions = [
            'all' => Permission::firstOrCreate(['name' => 'permissions']),
            'view-plants' => Permission::firstOrCreate(['name' => 'permissions.view-plants']),
            'view-myplants' => Permission::firstOrCreate(['name' => 'permissions.view-myplants']),
            'view-mylaw' => Permission::firstOrCreate(['name' => 'permissions.view-mylaw']),
            'view-laws' => Permission::firstOrCreate(['name' => 'permissions.view-laws']),
            'view-myqueries' => Permission::firstOrCreate(['name' => 'permissions.view-myqueries']),
            'view-queries' => Permission::firstOrCreate(['name' => 'permissions.view-queries']),
            'view-myadvice' => Permission::firstOrCreate(['name' => 'permissions.view-myadvice']),
            'view-advice' => Permission::firstOrCreate(['name' => 'permissions.view-advice']),
            'view-rooms' => Permission::firstOrCreate(['name' => 'permissions.view-rooms']),
            'create-room' => Permission::firstOrCreate(['name' => 'permissions.create-room']),
            'create-law' => Permission::firstOrCreate(['name' => 'permissions.create-law']),
            'create-advice' => Permission::firstOrCreate(['name' => 'permissions.create-advice']),
            'create-myplant' => Permission::firstOrCreate(['name' => 'permissions.create-myplant']),
            'create-remind' => Permission::firstOrCreate(['name' => 'permissions.create-remind']),
            'update-room' => Permission::firstOrCreate(['name' => 'permissions.update-room']),
            'update-myplant' => Permission::firstOrCreate(['name' => 'permissions.update-myplant']),
            'update-user-profile' => Permission::firstOrCreate(['name' => 'permissions.update-user-profile']),
            'update-user-status' => Permission::firstOrCreate(['name' => 'permissions.update-user-status']),
            'delete-myplant' => Permission::firstOrCreate(['name' => 'permissions.delete-myplant']),
        ];

        $expertsPermissions = [
            'all' => Permission::firstOrCreate(['name' => 'experts']),
            'view-plants' => Permission::firstOrCreate(['name' => 'experts.view-plants']),
            'view-myplants' => Permission::firstOrCreate(['name' => 'experts.view-myplants']),
            'view-myqueries' => Permission::firstOrCreate(['name' => 'experts.view-myqueries']),
            'view-myadvice' => Permission::firstOrCreate(['name' => 'experts.view-myadvice']),
            'view-advice' => Permission::firstOrCreate(['name' => 'experts.view-advice']),
            'view-rooms' => Permission::firstOrCreate(['name' => 'experts.view-rooms']),
            'create-room' => Permission::firstOrCreate(['name' => 'experts.create-room']),
            'create-advice' => Permission::firstOrCreate(['name' => 'experts.create-advice']),
            'create-myplant' => Permission::firstOrCreate(['name' => 'experts.create-myplant']),
            'create-remind' => Permission::firstOrCreate(['name' => 'experts.create-remind']),
            'update-room' => Permission::firstOrCreate(['name' => 'experts.update-room']),
            'update-myplant' => Permission::firstOrCreate(['name' => 'experts.update-myplant']),
            'update-user-profile' => Permission::firstOrCreate(['name' => 'experts.update-user-profile']),
            'delete-myplant' => Permission::firstOrCreate(['name' => 'experts.delete-myplant']),
        ];


        $userRole = Role::firstOrCreate(['name' => \App\Models\Role::USER_ROLE]);
        $userRole->givePermissionTo(
            $usersPermissions['all']
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
