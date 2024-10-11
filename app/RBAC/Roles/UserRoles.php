<?php

namespace App\RBAC\Roles;

enum UserRoles: string
{
    case OWNER = 'Owner';
    case ADMIN = 'Admin';
    case EMPLOYEE = 'Employee';
    case BASE = "Base";
}
