<?php

return [
    'Menu' => [
        // [
        //     'name' => 'Dashboard',
        //     'active' => 'dashboard',
        //     'route' => 'admin.dashboard',
        //     'icon' => 'layout-dashboard',
        //     'sub' => []
        // ],
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
            'name' => 'Sustainability Reports',
            'active' => 'sustainability-reports',
            'route' => 'admin.sustainability-reports.index',
            'icon' => 'report-analytics',
            'sub' => []
        ],
        [
            'name' => 'Offices',
            'active' => 'offices',
            'route' => 'admin.offices.index',
            'icon' => 'buildings',
            'sub' => []
        ],
        [
            'name' => 'Institutions',
            'active' => 'institutions',
            'route' => 'admin.institutions.index',
            'icon' => 'blocks',
            'sub' => []
        ],
        [
            'name' => 'Teams',
            'active' => 'teams',
            'route' => 'admin.teams.index',
            'icon' => 'users-group',
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
    ],
    'Page Management' => [
        [
            'name' => 'Home',
            'active' => 'home-content',
            'route' => 'admin.page-management.home-content.index',
            'icon' => 'home-edit',
            'sub' => []
        ],
        [
            'name' => 'About Us',
            'active' => 'about-us-content',
            'route' => '',
            'icon' => 'chart-treemap',
            'sub' => [
                [
                    'name' => 'Who We Are',
                    'active' => 'about-us-who-we-are',
                    'route' => 'admin.page-management.about-us-content.who-we-are.index',
                ],
                [
                    'name' => 'Our Histories',
                    'active' => 'our-histories',
                    'route' => 'admin.our-histories.index',
                ],
                [
                    'name' => 'Milestones',
                    'active' => 'milestones',
                    'route' => 'admin.milestones.index',
                ],
                [
                    'name' => 'Management Content',
                    'active' => 'about-us-management',
                    'route' => 'admin.page-management.about-us-content.management.index',
                ],
                [
                    'name' => 'Award Content',
                    'active' => 'about-us-award',
                    'route' => 'admin.page-management.about-us-content.award.index',
                ],
                [
                    'name' => 'Awards & Certificates',
                    'active' => 'awards-and-certificates',
                    'route' => '',
                    'sub' => [
                        [
                            'name' => 'Certificates',
                            'active' => 'certificates',
                            'route' => 'admin.awards-and-certificates.certificates.index',
                        ],
                        [
                            'name' => 'Categories',
                            'active' => 'certificate-categories',
                            'route' => 'admin.awards-and-certificates.certificate-categories.index',
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
                    'name' => 'Files',
                    'active' => 'about-us-files',
                    'route' => '',
                    'sub' => [
                        [
                            'name' => 'Company Profile Files',
                            'active' => 'company-profile-files',
                            'route' => 'admin.company-profiles.index',
                        ],
                        [
                            'name' => 'Guideline Files',
                            'active' => 'guideline-files',
                            'route' => 'admin.guidelines.index',
                        ],
                    ]
                ]
            ]
        ],
        [
            'name' => 'Our Business',
            'active' => 'our-business-content',
            'route' => '',
            'icon' => 'building-carousel',
            'sub' => [
                [
                    'name' => 'What We Do',
                    'active' => 'what-we-do',
                    'route' => 'admin.page-management.our-business-content.index'
                ],
                [
                    'name' => 'List',
                    'active' => 'our-business-list',
                    'route' => 'admin.page-management.our-business-list.index'
                ],
            ]
        ],
        [
            'name' => 'Investor',
            'active' => 'investor-content',
            'route' => 'admin.page-management.investor-content.index',
            'icon' => 'report-money',
            'sub' => []
        ],
        [
            'name' => 'Governance',
            'active' => 'governance-content',
            'route' => '',
            'icon' => 'building-bank',
            'sub' => [
                [
                    'name' => 'Content',
                    'active' => 'governance-content',
                    'route' => 'admin.page-management.governance-content.index'
                ],
                [
                    'name' => 'Files',
                    'active' => 'governance-files',
                    'route' => '',
                    'sub' => [
                        [
                            'name' => 'Corporate Secretary',
                            'active' => 'corporate_secretary',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'corporate_secretary']
                        ],
                        [
                            'name' => 'Internal Audit',
                            'active' => 'internal_audit',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'internal_audit']
                        ],
                        [
                            'name' => 'Audit Committe',
                            'active' => 'audit_committe',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'audit_committe']
                        ],
                        [
                            'name' => 'Sustainability Committe',
                            'active' => 'sustainability_committe',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'sustainability_committe']
                        ],
                        [
                            'name' => 'Risk Management',
                            'active' => 'risk_management',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'risk_management']
                        ],
                        [
                            'name' => 'Code of Conduct',
                            'active' => 'code_of_conduct',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'code_of_conduct']
                        ],
                        [
                            'name' => 'SHE Regulation',
                            'active' => 'she_regulation',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'she_regulation']
                        ],
                        [
                            'name' => 'Policy',
                            'active' => 'policy',
                            'route' => 'admin.page-management.governance-files.index',
                            'route_params' => ['type' => 'policy']
                        ],
                    ]
                ],
            ]
        ],
        [
            'name' => 'Sustainability',
            'active' => 'sustainability-content',
            'route' => '',
            'icon' => 'recycle',
            'sub' => [
                [
                    'name' => 'Overview',
                    'active' => 'sustainability-overview',
                    'route' => 'admin.page-management.sustainability-overview.index'
                ],
                [
                    'name' => 'Environment',
                    'active' => 'sustainability-environment',
                    'route' => 'admin.page-management.sustainability-environment.index'
                ],
                [
                    'name' => 'Social',
                    'active' => 'sustainability-social',
                    'route' => 'admin.page-management.sustainability-social.index'
                ],
                [
                    'name' => 'Governance',
                    'active' => 'sustainability-governance',
                    'route' => 'admin.page-management.sustainability-governance.index'
                ],
                [
                    'name' => 'Report',
                    'active' => 'sustainability-report',
                    'route' => 'admin.page-management.sustainability-report.index'
                ],
                [
                    'name' => 'In Action',
                    'active' => 'sustainability-action',
                    'route' => 'admin.page-management.sustainability-action.index'
                ],
                [
                    'name' => 'Responsible',
                    'active' => 'responsibles',
                    'route' => 'admin.responsibles.index',
                ],
                [
                    'name' => 'Ratings & Recognitions',
                    'active' => 'rating-recognitions',
                    'route' => 'admin.rating-recognitions.index',
                ],
                [
                    'name' => 'Tabs',
                    'active' => 'sustainability-tabs',
                    'route' => '',
                    'sub' => [
                        [
                            'name' => 'Environment',
                            'active' => 'sustainability-tabs-environment',
                            'route' => 'admin.sustainability-tabs.index',
                            'route_params' => ['category' => 'environment']
                        ],
                        [
                            'name' => 'Social',
                            'active' => 'sustainability-tabs-social',
                            'route' => 'admin.sustainability-tabs.index',
                            'route_params' => ['category' => 'social']
                        ],
                        [
                            'name' => 'Governance',
                            'active' => 'sustainability-tabs-governance',
                            'route' => 'admin.sustainability-tabs.index',
                            'route_params' => ['category' => 'governance']
                        ]
                    ]
                ],
                [
                    'name' => 'Contents',
                    'active' => 'sustainability-contents',
                    'route' => '',
                    'sub' => [
                        [
                            'name' => 'Environment',
                            'active' => 'sustainability-contents-environment',
                            'route' => 'admin.sustainability-contents.index',
                            'route_params' => ['category' => 'environment']
                        ],
                        [
                            'name' => 'Social',
                            'active' => 'sustainability-contents-social',
                            'route' => 'admin.sustainability-contents.index',
                            'route_params' => ['category' => 'social']
                        ],
                        [
                            'name' => 'Governance',
                            'active' => 'sustainability-contents-governance',
                            'route' => 'admin.sustainability-contents.index',
                            'route_params' => ['category' => 'governance']
                        ]
                    ]
                ]
            ]
        ],
        [
            'name' => 'Other',
            'active' => 'other-content',
            'route' => 'admin.page-management.other-content.index',
            'icon' => 'align-box-left-middle',
            'sub' => []
        ],


    ]

];
