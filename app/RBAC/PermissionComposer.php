<?php

namespace App\RBAC;

use App\RBAC\Roles\UserRoles;

class PermissionComposer
{
    protected array $config = [];

    public function __construct()
    {
        $this->config = config('acl.roles');
    }

    public function permissionsForRole(string|UserRoles $role): array
    {
        if ($role instanceof UserRoles) {
            $role = $role->value;
        }

        $roleConfig = $this->config[$role] ??
            throw new \RuntimeException("Role configuration not found for '$role'");
        $parentPermissions = [];
        foreach ($roleConfig['extends'] ?? [] as $parentRoles) {
            $parentPermissions = array_merge($parentPermissions, $this->permissionsForRole($parentRoles));
        }

        $thisRolePermissions = array_merge($parentPermissions, $roleConfig['allow'] ?? []);
        $thisRolePermissions = array_diff($thisRolePermissions, $roleConfig['deny'] ?? []);

        return $thisRolePermissions;
    }
}
