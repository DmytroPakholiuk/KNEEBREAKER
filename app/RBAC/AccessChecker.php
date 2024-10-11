<?php

namespace App\RBAC;

use App\Models\User;
use App\RBAC\Roles\UserRoles;

class AccessChecker
{
    public function __construct(
        protected PermissionComposer $permissionComposer,
    )
    {

    }

    public function forUser(?User $user, \UnitEnum|string $permission)
    {
        $role = $user?->role ?? UserRoles::BASE;

        $this->forRole($role, $permission);
    }

    public function forRole(UserRoles $role, \UnitEnum|string $permission)
    {
        if ($permission instanceof \UnitEnum) {
            $permission = $permission->value;
        }

        $permissions = $this->permissionComposer->permissionsForRole($role);
        $hasPermission = in_array($permission, $permissions);

        if (!$hasPermission) {
            abort(403);
        }
    }
}
