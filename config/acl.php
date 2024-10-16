<?php

use App\RBAC\Roles\UserRoles;

return [
    "roles" => [
        UserRoles::BASE->value => [
            "allow" => [
                \App\RBAC\Permissions\DashboardPermissions::VIEW->value,
            ],
        ],
        UserRoles::OWNER->value => [
            "extends" => [
                UserRoles::BASE->value,
            ],
            "allow" => [
                \App\RBAC\Permissions\ConfigurationPermissions::VIEW->value,
                \App\RBAC\Permissions\ReportPermission::VIEW->value,

                \App\RBAC\Permissions\UserPermissions::VIEW->value,
                \App\RBAC\Permissions\UserPermissions::CREATE->value,
                \App\RBAC\Permissions\UserPermissions::UPDATE->value,
                \App\RBAC\Permissions\UserPermissions::DELETE->value,
            ],
            "deny" => [
                // denying permissions here would overwrite the allows of this role
            ]
        ],
        UserRoles::ADMIN->value => [
            "extends" => [
                UserRoles::BASE->value,
            ],
            "allow" => [
                \App\RBAC\Permissions\ConfigurationPermissions::VIEW->value,
            ],
        ],
        UserRoles::EMPLOYEE->value => [
            "extends" => [
                UserRoles::BASE->value,
            ],
            "allow" => [
                \App\RBAC\Permissions\ReportPermission::VIEW,
            ],
        ]

    ]
];
