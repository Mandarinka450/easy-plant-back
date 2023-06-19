<?php


namespace App;


use App\Models\Permission;
use App\Models\User;

class PermissionManager
{
    private ?User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function giveUserPermissions()
    {
        $this->givePermissionsByModule(Permission::USER_MODULE, $this->user->id);
    }

    public function giveExpertPermissions()
    {
        $this->givePermissionsByModule(Permission::USER_MODULE, $this->user->id);
        $this->givePermissionsByModule(Permission::EXPERT_MODULE, $this->user->id);
    }

    public function giveAdminPermissions()
    {
        $this->givePermissionsByModule(Permission::USER_MODULE, $this->user->id);
        $this->givePermissionsByModule(Permission::EXPERT_MODULE, $this->user->id);
        // $this->givePermissionsByModule(Permission::ADMIN_MODULE, $this->user->id);
    }

    public function givePermissionsByModule($module, $id = null)
    {
        $id = ($id) ? ".{$id}" : "";

        Permission::findOrCreate("{$module}.view-plants" . $id);
        Permission::findOrCreate("{$module}.view-myplants" . $id);
        Permission::findOrCreate("{$module}.view-mylaw" . $id);
        Permission::findOrCreate("{$module}.view-laws" . $id);
        Permission::findOrCreate("{$module}.view-myqueries" . $id);
        Permission::findOrCreate("{$module}.view-queries" . $id);
        Permission::findOrCreate("{$module}.view-myadvice" . $id);
        Permission::findOrCreate("{$module}.view-advice" . $id);
        Permission::findOrCreate("{$module}.view-rooms" . $id);
        Permission::findOrCreate("{$module}.create-room" . $id);
        Permission::findOrCreate("{$module}.create-law" . $id);
        Permission::findOrCreate("{$module}.create-advice" . $id);
        Permission::findOrCreate("{$module}.create-myplant" . $id);
        Permission::findOrCreate("{$module}.create-remind" . $id);
        Permission::findOrCreate("{$module}.update-room" . $id);
        Permission::findOrCreate("{$module}.update-myplant" . $id);
        Permission::findOrCreate("{$module}.update-user-profile" . $id);
        Permission::findOrCreate("{$module}.update-user-status" . $id);
        Permission::findOrCreate("{$module}.delete-myplant" . $id);

        $this->user->givePermissionTo(
            "{$module}.view-plants" . $id,
            "{$module}.view-myplants" . $id,
            "{$module}.view-mylaw" . $id,
            "{$module}.view-laws" . $id,
            "{$module}.view-myqueries" . $id,
            "{$module}.view-queries" . $id,
            "{$module}.view-myadvice" . $id,
            "{$module}.view-advice" . $id,
            "{$module}.view-rooms" . $id,
            "{$module}.create-room" . $id,
            "{$module}.create-law" . $id,
            "{$module}.create-advice" . $id,
            "{$module}.create-myplant" . $id,
            "{$module}.create-remind" . $id,
            "{$module}.update-room" . $id,
            "{$module}.update-myplant" . $id,
            "{$module}.update-user-profile" . $id,
            "{$module}.update-user-status" . $id,
            "{$module}.delete-myplant" . $id
        );
    }

    public function revokePermissionsByModule($module, $id = null)
    {
        $id = ($id) ? ".{$id}" : "";

        if (Permission::where('name', "{$module}.view-plants" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-plants" . $id);
        }

        if (Permission::where('name', "{$module}.view-myplants" . $id,)->first()) {
            $this->user->revokePermissionTo("{$module}.view-myplants" . $id,);
        }

        if (Permission::where('name', "{$module}.view-mylaw" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-mylaw" . $id);
        }

        if (Permission::where('name', "{$module}.view-laws" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-laws" . $id);
        }

        if (Permission::where('name', "{$module}.view-myqueries" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-myqueries" . $id);
        }

        if (Permission::where('name', "{$module}.view-queries" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-queries" . $id);
        }

        if (Permission::where('name', "{$module}.view-myadvice" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-myadvice" . $id);
        }

        if (Permission::where('name', "{$module}.view-advice" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-advice" . $id);
        }

        if (Permission::where('name', "{$module}.view-rooms" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.view-rooms" . $id);
        }

        if (Permission::where('name', "{$module}.create-room" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.create-room" . $id);
        }

        if (Permission::where('name', "{$module}.create-law" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.create-law" . $id);
        }

        if (Permission::where('name', "{$module}.create-myplant" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.create-myplant" . $id);
        }

        if (Permission::where('name', "{$module}.create-advice" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.create-advice" . $id);
        }

        if (Permission::where('name', "{$module}.create-remind" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.create-remind" . $id);
        }

        if (Permission::where('name', "{$module}.update-room" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.update-room" . $id);
        }

        if (Permission::where('name', "{$module}.update-myplant" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.update-myplant" . $id);
        }

        if (Permission::where('name', "{$module}.update-user-profile" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.update-user-profile" . $id);
        }

        if (Permission::where('name', "{$module}.update-user-status" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.update-user-status" . $id);
        }

        if (Permission::where('name', "{$module}.delete-myplant" . $id)->first()) {
            $this->user->revokePermissionTo("{$module}.delete-myplant" . $id);
        }
    }
}
