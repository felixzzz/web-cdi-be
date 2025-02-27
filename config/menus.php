<?php

return [
    'admin' => [
        [
            'name' => 'Dashboard',
            'active' => 'dashboard',
            'route' => 'admin.dashboard',
            'icon' => 'layout-dashboard',
            'sub' => []
        ],
        [
            'name' => 'Article',
            'active' => 'Article',
            'route' => '',
            'icon' => 'news',
            'sub' => [
                [
                    'name' => 'News',
                    'active' => 'news',
                    'route' => '',
                ],
                [
                    'name' => 'Blog',
                    'active' => 'blog',
                    'route' => '',
                ],
                [
                    'name' => 'Press Release',
                    'active' => 'press-release',
                    'route' => '',
                ]
            ]
        ],
    ]
];
