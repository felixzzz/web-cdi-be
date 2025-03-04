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
                route: ''
            },
            {
                name: 'Management',
                route: ''
            },
            {
                name: 'Awards & Certification',
                route: ''
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
                route: ''
            },
            {
                name: 'Energy',
                route: ''
            },
            {
                name: 'Water',
                route: ''
            },
            {
                name: 'Ports & Storage',
                route: ''
            },
            {
                name: 'Logistic',
                route: ''
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
                route: ''
            },
            {
                name: 'Financial Information',
                route: ''
            },
            {
                name: 'Shares Information',
                route: ''
            },
            {
                name: 'Publications for Investors',
                route: ''
            }
        ],
        external: false
    },
    {
        name: 'Governance',
        route: '',
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
        route: route('media'),
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
