import { defineStore } from 'pinia'

import useCrypto from './useCrypto'
import useRequest from './useRequest'
import { PreferenceAboutAward, PreferenceAboutManagement, PreferenceAboutOverview, PreferenceGovernance, PreferenceHome } from '@/types/utility'

const { encrypt, decrypt } = useCrypto()

const CACHE_HOME_CONTENT = "home-cnt"
const CACHE_GOVERNANCE_CONTENT = "gvn-cnt"
const CACHE_ABOUT_US_AWARD_CONTENT = "abt-awrd-cnt"
const CACHE_ABOUT_US_MANAGEMENT_CONTENT = "abt-mg-cnt"
const CACHE_ABOUT_US_OVERVIEW_CONTENT = "abt-ovr-cnt"



export const useContentStore = defineStore('content', {
    state: () => ({
        home: __getHome(),
        governance: __getGovernance(),
        aboutAward: __getAboutUsAward(),
        aboutManagement: __getAboutUsManagement(),
        aboutOverview: __getAboutUsOverview(),
    }),
    actions: {
        getHome() {
            return useRequest().get(route('api.utility.home')).then((result) => {
                this.home = result.data
                localStorage.setItem(CACHE_HOME_CONTENT, encrypt(result.data))
            })
        },
        getGovernance() {
            return useRequest().get(route('api.utility.governance')).then((result) => {
                this.governance = result.data
                localStorage.setItem(CACHE_GOVERNANCE_CONTENT, encrypt(result.data))
            })
        },
        getAboutUsAward() {
            return useRequest().get(route('api.utility.about-us.index', 'award')).then((result) => {
                this.aboutAward = result.data
                localStorage.setItem(CACHE_ABOUT_US_AWARD_CONTENT, encrypt(result.data))
            })
        },
        getAboutUsManagement() {
            return useRequest().get(route('api.utility.about-us.index', 'management')).then((result) => {
                this.aboutManagement = result.data
                localStorage.setItem(CACHE_ABOUT_US_MANAGEMENT_CONTENT, encrypt(result.data))
            })
        },
        getAboutUsOverview() {
            return useRequest().get(route('api.utility.about-us.index', 'who-we-are')).then((result) => {
                this.aboutOverview = result.data
                localStorage.setItem(CACHE_ABOUT_US_OVERVIEW_CONTENT, encrypt(result.data))
            })
        },
    }
})



const __getHome = (): PreferenceHome => {
    const content = __getStorage(CACHE_HOME_CONTENT);
    return content ? content : {
        home_banner: null,
        home_about_section: null,
        home_infrastructure_title: null,
        home_infrastructure_energy: null,
        home_infrastructure_water: null,
        home_infrastructure_port_storage: null,
        home_infrastructure_logistic: null,
        home_discover_title: null,
        home_discover_sustainability: null,
        home_discover_our_business: null,
        home_discover_investor: null,
        home_discover_career: null,
        home_journey_tagline: null,
        home_journey_content: null,
        home_journey_info_1: null,
        home_journey_info_2: null,
        home_journey_info_3: null
    }
}

const __getGovernance = (): PreferenceGovernance => {
    const content = __getStorage(CACHE_GOVERNANCE_CONTENT);
    return content ? content : {
        governance_banner: null,
        governance_corporate_secretary_team: null,
        governance_corporate_secretary: null,
        governance_internal_audit_unit: null,
        governance_audit_committe: null,
        governance_audit_committe_member_text: null,
        governance_sustainability_committe: null,
        governance_risk_management: null,
        governance_code_of_conduct: null,
        governance_she_regulation: null,
        governance_policy: null,
        governance_whistleblowing: null,
        governance_whistleblowing_detail: null,
    }
}

const __getAboutUsAward = (): PreferenceAboutAward => {
    const content = __getStorage(CACHE_ABOUT_US_AWARD_CONTENT);
    return content ? content : {
        about_us_award_banner: null,
        about_us_award_overview: null,
    }
}

const __getAboutUsManagement = (): PreferenceAboutManagement => {
    const content = __getStorage(CACHE_ABOUT_US_MANAGEMENT_CONTENT);
    return content ? content : {
        about_us_management_banner: null,
        about_us_management_overview: null,
        about_us_organization_structure: null,
        about_us_corporate_structure: null,
        about_us_corporate_structure_table: null,
        about_us_guideline: null,
    }
}

const __getAboutUsOverview = (): PreferenceAboutOverview => {
    const content = __getStorage(CACHE_ABOUT_US_OVERVIEW_CONTENT);
    return content ? content : {
        about_us_banner: null,
        about_us_company_overview_tagline: null,
        about_us_company_overview: null,
        about_us_company_overview_background: null,
        about_us_vision_mission_tagline: null,
        about_us_vision: null,
        about_us_mission: null,
        about_us_milestone: null,
        about_us_company_profile: null,
    }
}

const __getStorage = (KEY: string) => {
    const value = localStorage.getItem(KEY)
    if (!value) {
        return null
    }
    return decrypt(value)
}
