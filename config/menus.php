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
            'name' => 'Awards & Certificates',
            'active' => 'awards-and-certificates',
            'route' => '',
            'icon' => 'certificate',
            'sub' => [
                [
                    'name' => 'Certificate Categories',
                    'active' => 'certificate-categories',
                    'route' => 'admin.awards-and-certificates.certificate-categories.index',
                ],
                [
                    'name' => 'Certificates',
                    'active' => 'certificates',
                    'route' => 'admin.awards-and-certificates.certificates.index',
                ],
                [
                    'name' => 'Awards',
                    'active' => 'awards',
                    'route' => 'admin.awards-and-certificates.awards.index',
                ],
                [
                    'name' => 'Memberships',
                    'active' => 'memberships',
                    'route' => 'admin.awards-and-certificates.memberships.index',
                ]
            ]
        ],
        [
            'name' => 'Inbox',
            'active' => 'inbox',
            'route' => '',
            'icon' => 'inbox',
            'sub' => [
                [
                    'name' => 'Contact Us',
                    'active' => 'contact-us',
                    'route' => 'admin.inbox.contact-us.index',
                ],
                [
                    'name' => 'Whistleblowing',
                    'active' => 'whistleblowing',
                    'route' => 'admin.inbox.whistleblowing.index',
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
            'name' => 'Offices',
            'active' => 'offices',
            'route' => 'admin.offices.index',
            'icon' => 'buildings',
            'sub' => []
        ],
        [
            'name' => 'Ratings & Recognitions',
            'active' => 'rating-recognitions',
            'route' => 'admin.rating-recognitions.index',
            'icon' => 'topology-star-3',
            'sub' => []
        ],
        [
            'name' => 'Master',
            'active' => 'master',
            'route' => '',
            'icon' => 'brand-databricks',
            'sub' => [
                [
                    'name' => 'Quick Links',
                    'active' => 'quick-links',
                    'route' => 'admin.quick-links.index',
                ],
                [
                    'name' => 'Countries',
                    'active' => 'countries',
                    'route' => 'admin.countries.index',
                ],
                [
                    'name' => 'Topics',
                    'active' => 'topics',
                    'route' => 'admin.topics.index',
                ]
            ]
        ]
    ]
];
