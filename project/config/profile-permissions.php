<?php

use App\Enums\UserRolesEnum;

return [
    UserRolesEnum::ADMIN => [
        'admin' => [
            'create',
            'edit',
            'show',
            'list',
            'delete',
        ],

        'client' => [
            'create',
            'edit',
            'show',
            'list',
            'delete',
        ],
    ],

    UserRolesEnum::CLIENT => [
        'client' => [
            'edit',
            'show',
            'delete',
        ],
    ]
];