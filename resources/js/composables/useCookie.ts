const applicationCookieConsent = "CookieScriptConsent";
const cookieList = {
    strict: [],
    performance: [
        '_gid', '_gat_UA-30334044-1', '_gat_U30334044A--8', '_ga', '_ga_LSH16HZP8B', '_ga_LZ6T0L52F3'
    ],
    targeting: [
        '_fbp', 'IDE', '_gcl_au', 'test_cookie', 'YSC', 'VISITOR_INFO1_LIVE'
    ],
    functionality: [],
    unclassified: [
        'VISITOR_PRIVACY_METADATA'
    ],
}
export default function useCookie() {
    const applicationCookie = [
        {
            id: 'strict',
            required: true,
            label: 'strictly necessary'
        },
        {
            id: 'performance',
            required: false,
            label: 'performance'
        }, {
            id: 'targeting',
            required: false,
            label: 'targeting'
        }, {
            id: 'functionality',
            required: false,
            label: 'functionality'
        }, {
            id: 'unclassified',
            required: false,
            label: 'unclassified'
        }
    ]

    const createCookie = (key: string, value: string, longDay: number) => {
        const expires = new Date(Date.now() + longDay * 24 * 60 * 60 * 1000).toUTCString();
        document.cookie = `${key}=${value}; path=/; expires=${expires}; secure`;
    }


    const deleteCookie = (key: string) => {
        document.cookie = `${key}=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC; secure`;
    }

    const getCookie = (key: string) => {
        const cookies = document.cookie.split("; ");
        const cookie = cookies.find(row => row.startsWith(`${key}=`));
        return cookie
    }

    const accept = (keys:string[]) => {
        const allCookies = [
            ...cookieList.strict,
            ...cookieList.performance,
            ...cookieList.targeting,
            ...cookieList.functionality,
            ...cookieList.unclassified,
        ]
        const acceptedCookie : string[] = cookieList.strict
        if(keys.includes("performance")){
            acceptedCookie.push(...cookieList.performance)
        }
        if(keys.includes("targeting")){
            acceptedCookie.push(...cookieList.targeting)
        }
        if(keys.includes("functionality")){
            acceptedCookie.push(...cookieList.functionality)
        }
        if(keys.includes("unclassified")){
            acceptedCookie.push(...cookieList.unclassified)
        }

        for (const cookie of allCookies) {
            if(!acceptedCookie.includes(cookie)){
                deleteCookie(cookie)
            }
        }
        createCookie(applicationCookieConsent, JSON.stringify({
            status: 'accept',
            cookie: acceptedCookie
        }), 30)
    }

    const decline = () => {
        const allCookies = [
            ...cookieList.strict,
            ...cookieList.performance,
            ...cookieList.targeting,
            ...cookieList.functionality,
            ...cookieList.unclassified,
        ]
        for (const cookie of allCookies) {
            deleteCookie(cookie)
        }
        createCookie(applicationCookieConsent, JSON.stringify({
            status: 'reject',
            cookie: []
        }), 30)
    }


    return {
        accept,
        decline,
        createCookie,
        deleteCookie,
        getCookie,
        applicationCookie,
        applicationCookieConsent
    }
}
