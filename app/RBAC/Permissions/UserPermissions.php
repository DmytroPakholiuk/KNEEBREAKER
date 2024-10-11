<?php

namespace App\RBAC\Permissions;

enum UserPermissions: string
{
    case CREATE = 'create__user';
    case UPDATE = 'update__user';
    case DELETE = 'delete__user';
    case VIEW = 'view__user';
}
