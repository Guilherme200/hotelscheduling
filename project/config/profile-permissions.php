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

        'room' => [
            'create',
            'edit',
            'show',
            'list',
            'delete',
        ],

        'hotel' => [
            'create',
            'edit',
            'show',
            'list',
            'delete',
        ],

        'category' => [
            'create',
            'edit',
            'show',
            'list',
            'delete',
        ],

        'reservation' => [
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

        'reservation' => [
            'create',
            'list',
            'delete',
        ],
    ]
];