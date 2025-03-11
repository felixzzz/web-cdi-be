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
            'active' => 'article',
            'route' => '',
            'icon' => 'news',
            'sub' => [
                [
                    'name' => 'Category',
                    'active' => 'article-categories',
                    'route' => 'admin.article-categories.index',
                ],
                [
                    'name' => 'News',
                    'active' => 'news',
                    'route' => 'admin.article.news.index',
                ],
                [
                    'name' => 'Blog',
                    'active' => 'blog',
                    'route' => 'admin.article.blog.index',
                ],
                [
                    'name' => 'Press Release',
                    'active' => 'press-release',
                    'route' => 'admin.article.press-releases.index',
                ]
            ]
        ],
        [
            'name' => 'Investor',
            'active' => 'investor',
            'route' => '',
            'icon' => 'report-money',
            'sub' => [
                [
                    'name' => 'Reports',
                    'active' => 'investor-reports',
                'route' => 'admin.investor.reports.index',
                ]
            ]
        ],
        [
            'name' => 'Quick Links',
            'active' => 'quick-links',
            'route' => 'admin.quick-links.index',
            'icon' => 'link',
            'sub' => []
        ],
    ]
];
