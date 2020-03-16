<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'dashboards' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'videos' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'comments' => 'c,r,u,d',
            'messages' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'skills' => 'c,r,u,d'
        ],
        'admin' => [],


    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ]
];
