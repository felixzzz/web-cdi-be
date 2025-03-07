export const MENU = [
    {
        name: 'Home',
        route: route('home'),
        active: 'home',
        subs: [],
        external: false
    },
    {
        name: 'About Us',
        route: '',
        active: 'about-us',
        subs: [
            {
                name: 'Who We Are',
                route: route('about-us.who-we-are')
            },
            {
                name: 'Management',
                route: route('about-us.management')
            },
            {
                name: 'Awards & Certification',
                route: route('about-us.awards')
            }
        ],
        external: false
    },
    {
        name: 'Our Business',
        route: '',
        active: 'our-business',
        subs: [
            {
                name: 'What We Do',
                route: route('our-business.what-we-do')
            },
            {
                name: 'Energy',
                route: route('our-business.energy')
            },
            {
                name: 'Water',
                route: route('our-business.water')
            },
            {
                name: 'Ports & Storage',
                route: route('our-business.ports-and-storage')
            },
            {
                name: 'Logistic',
                route: route('our-business.logistics')
            }
        ],
        external: false
    },
    {
        name: 'Investor',
        route: '',
        active: 'investor',
        subs: [
            {
                name: 'Report',
                route: route('investor.report')
            },
            {
                name: 'Financial Information',
                route: route('investor.financial-information')
            },
            {
                name: 'Shares Information',
                route: route('investor.shares-information')
            },
            {
                name: 'Publications for Investors',
                route: route('investor.publications-for-investors')
            }
        ],
        external: false
    },
    {
        name: 'Governance',
        route: route('governance.index'),
        active: 'governance',
        subs: [],
        external: false
    },
    {
        name: 'Sustainability',
        route: '',
        active: 'sustainability',
        subs: [
            {
                name: 'Overview',
                route: ''
            },
            {
                name: 'Environment',
                route: ''
            },
            {
                name: 'Social',
                route: ''
            },
            {
                name: 'Governance',
                route: ''
            },
            {
                name: 'Sustainablitity in Action',
                route: ''
            },
            {
                name: 'Report & Publication',
                route: ''
            }
        ],
        external: false
    },
    {
        name: 'Media',
        route: route('media.index', { type: 'news' }),
        active: 'media',
        subs: [],
        external: false
    },
    {
        name: 'Career',
        route: '',
        active: 'career',
        subs: [],
        external: true
    },
    {
        name: 'Contact Us',
        route: route('contact-us'),
        active: 'contact-us',
        subs: [],
        external: false
    }
]
