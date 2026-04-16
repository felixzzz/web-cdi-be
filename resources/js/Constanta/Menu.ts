export const MENU = [
    {
        name: 'navbar.home',
        route: route('home'),
        active: 'home',
        subs: [],
        external: false
    },
    {
        name: 'navbar.about_us',
        route: '',
        active: 'about-us',
        subs: [
            {
                name: 'navbar.who_we_are',
                route: route('about-us.who-we-are')
            },
            {
                name: 'navbar.management',
                route: route('about-us.management')
            },
            {
                name: 'navbar.awards_certification',
                route: route('about-us.awards')
            }
        ],
        external: false
    },
    {
        name: 'navbar.our_business',
        route: '',
        active: 'our-business',
        subs: [
            {
                name: 'navbar.what_we_do',
                route: route('our-business.what-we-do')
            },
            {
                name: 'navbar.energy',
                route: route('our-business.energy')
            },
            {
                name: 'navbar.water',
                route: route('our-business.water')
            },
            {
                name: 'navbar.ports_storage',
                route: route('our-business.ports-and-storage')
            },
            {
                name: 'navbar.logistic',
                route: route('our-business.logistics')
            }
        ],
        external: false
    },
    {
        name: 'navbar.investor',
        route: '',
        active: 'investor',
        subs: [
            {
                name: 'navbar.financial_information',
                route: route('investor.report')
            },
            {
                name: 'navbar.report',
                route: route('investor.financial-information')
            },
            {
                name: 'navbar.shares_information',
                route: route('investor.shares-information')
            },
            {
                name: 'navbar.publications_for_investors',
                route: route('investor.publications-for-investors')
            }
        ],
        external: false
    },
    {
        name: 'navbar.governance',
        route: route('governance.index'),
        active: 'governance',
        subs: [],
        external: false
    },
    {
        name: 'navbar.sustainability',
        route: '',
        active: 'sustainability',
        subs: [
            {
                name: 'navbar.overview',
                route: route('sustainability.overview')
            },
            {
                name: 'navbar.environment',
                route: route('sustainability.environment')
            },
            {
                name: 'navbar.social',
                route: route('sustainability.social')
            },
            {
                name: 'navbar.governance_section',
                route: route('sustainability.governance')
            },
            // {
            //     name: 'navbar.sustainability_in_action',
            //     route: route('sustainability.sustainability-in-action')
            // },
            // {
            //     name: 'navbar.report_publication',
            //     route: route('sustainability.report-and-publication')
            // }
        ],
        external: false
    },
    {
        name: 'navbar.media',
        route: route('media.index', { type: 'news' }),
        active: 'media',
        subs: [],
        external: false
    },
    {
        name: 'navbar.career',
        route: '',
        active: 'career',
        subs: [],
        external: true
    },
    {
        name: 'navbar.contact_us',
        route: route('contact-us'),
        active: 'contact-us',
        subs: [],
        external: false
    }
];
