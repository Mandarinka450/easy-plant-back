<?php


namespace App\Models;

use Spatie\Permission\Models\Permission as OriginalPermission;

class Permission extends OriginalPermission
{
    public const USER_MODULE = 'users';
    public const EXPERT_MODULE = 'experts';

    public $guard_name = 'api';
}
