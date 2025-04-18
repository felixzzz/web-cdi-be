import { defineStore } from 'pinia'

import useCrypto from './useCrypto'
import useRequest from './useRequest'
import { Office, PreferenceAboutAward, PreferenceAboutManagement, PreferenceAboutOverview, PreferenceGovernance, PreferenceHome, PreferenceInvestor, PreferenceItem, PreferenceOurBusiness, PreferenceSocialMedia, PreferenceSustainabilityAction, PreferenceSustainabilityEnvironment, PreferenceSustainabilityGovernance, PreferenceSustainabilityOverview, PreferenceSustainabilityReport, PreferenceSustainabilitySocial } from '@/types/utility'

const { encrypt, decrypt } = useCrypto()

const CACHE_HOME_CONTENT = "home-cnt"
const CACHE_GOVERNANCE_CONTENT = "gvn-cnt"
const CACHE_ABOUT_US_AWARD_CONTENT = "abt-awrd-cnt"
const CACHE_ABOUT_US_MANAGEMENT_CONTENT = "abt-mg-cnt"
const CACHE_ABOUT_US_OVERVIEW_CONTENT = "abt-ovr-cnt"
const CACHE_MAIN_OFFICE_CONTENT = "off-cnt"
const CACHE_MEDIA_CONTENT = "media-cnt"
const CACHE_OURBUSINESS_CONTENT = "obsn-cnt"
const CACHE_INVESTOR_CONTENT = "inv-cnt"

const CACHE_SUSTAIN_OVR_CONTENT = "sst-ovr"
const CACHE_SUSTAIN_ENV_CONTENT = "sst-env"
const CACHE_SUSTAIN_SOCIAL_CONTENT = "sst-scl"
const CACHE_SUSTAIN_GVN_CONTENT = "sst-gvn"
const CACHE_SUSTAIN_RPT_CONTENT = "sst-rpt"
const CACHE_SUSTAIN_ACT_CONTENT = "sst-act"
const CACHE_SOCIAL_MEDIA = "scl-md"


export const useContentStore = defineStore('content', {
    state: () => ({
        home: __getHome(),
        governance: __getGovernance(),
        aboutAward: __getAboutUsAward(),
        aboutManagement: __getAboutUsManagement(),
        aboutOverview: __getAboutUsOverview(),
        office: __getMainOffice(),
        media: __getMedia(),
        ourBusiness: __getOurBusiness(),
        investor: __getInvestor(),
        sustainabilityOverview: __getSustainabilityOverview(),
        sustainabilityEnvironment: __getSustainabilityEnvironment(),
        sustainabilitySocial: __getSustainabilitySocial(),
        sustainabilityGovernance: __getSustainabilityGovernance(),
        sustainabilityReport: __getSustainabilityReport(),
        sustainabilityAction: __getSustainabilityAction(),
        socialMedia: __getSocialMedia(),

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
        getMainOffice() {
            return useRequest().get(route('api.utility.main-office')).then((result) => {
                this.office = result.data
                localStorage.setItem(CACHE_MAIN_OFFICE_CONTENT, encrypt(result.data))
            })
        },
        getMedia() {
            return useRequest().get(route('api.utility.additional-page', 'media_main')).then((result) => {
                this.media = result.data
                localStorage.setItem(CACHE_MEDIA_CONTENT, encrypt(result.data))
            })
        },
        getOurBusiness() {
            return useRequest().get(route('api.utility.our-business')).then((result) => {
                this.ourBusiness = result.data
                localStorage.setItem(CACHE_OURBUSINESS_CONTENT, encrypt(result.data))
            })
        },
        getInvestor() {
            return useRequest().get(route('api.utility.investor')).then((result) => {
                this.investor = result.data
                localStorage.setItem(CACHE_INVESTOR_CONTENT, encrypt(result.data))
            })
        },
        getSustainabilityOverview() {
            return useRequest().get(route('api.utility.sustainability.index', 'overview')).then((result) => {
                this.sustainabilityOverview = result.data
                localStorage.setItem(CACHE_SUSTAIN_OVR_CONTENT, encrypt(result.data))
            })
        },
        getSustainabilityEnvironment() {
            return useRequest().get(route('api.utility.sustainability.index', 'environment')).then((result) => {
                this.sustainabilityEnvironment = result.data
                localStorage.setItem(CACHE_SUSTAIN_ENV_CONTENT, encrypt(result.data))
            })
        },
        getSustainabilitySocial() {
            return useRequest().get(route('api.utility.sustainability.index', 'social')).then((result) => {
                this.sustainabilitySocial = result.data
                localStorage.setItem(CACHE_SUSTAIN_SOCIAL_CONTENT, encrypt(result.data))
            })
        },
        getSustainabilityGovernance() {
            return useRequest().get(route('api.utility.sustainability.index', 'governance')).then((result) => {
                this.sustainabilityGovernance = result.data
                localStorage.setItem(CACHE_SUSTAIN_GVN_CONTENT, encrypt(result.data))
            })
        },
        getSustainabilityReport() {
            return useRequest().get(route('api.utility.sustainability.index', 'report')).then((result) => {
                this.sustainabilityReport = result.data
                localStorage.setItem(CACHE_SUSTAIN_RPT_CONTENT, encrypt(result.data))
            })
        },
        getSustainabilityAction() {
            return useRequest().get(route('api.utility.sustainability.index', 'action')).then((result) => {
                this.sustainabilityAction = result.data
                localStorage.setItem(CACHE_SUSTAIN_ACT_CONTENT, encrypt(result.data))
            })
        },
        getSocialMedia() {
            return useRequest().get(route('api.utility.social-media')).then((result) => {
                this.socialMedia = result.data
                localStorage.setItem(CACHE_SOCIAL_MEDIA, encrypt(result.data))
            })
        }
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
        governance_whistleblowing_id: null,
        governance_whistleblowing_detail: null,
        governance_audit_committe_show: null,
        governance_audit_committe_member_text_show: null,
        governance_sustainability_committe_show: null,
        governance_risk_management_show: null,
        governance_she_regulation_show: null,
        governance_policy_show: null,
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

const __getMainOffice = (): Office | null => {
    const content = __getStorage(CACHE_MAIN_OFFICE_CONTENT);
    return content ? content : null
}

const __getMedia = (): PreferenceItem | null => {
    const content = __getStorage(CACHE_MEDIA_CONTENT);
    return content ? content : null
}

const __getOurBusiness = (): PreferenceOurBusiness => {
    const content = __getStorage(CACHE_OURBUSINESS_CONTENT);
    return content ? content : {
        our_business_banner: null,
        our_business_overview: null,
    }
}

const __getInvestor = (): PreferenceInvestor | null => {
    const content = __getStorage(CACHE_INVESTOR_CONTENT);
    return content ? content : null
}

const __getSustainabilityOverview = (): PreferenceSustainabilityOverview => {
    const content = __getStorage(CACHE_SUSTAIN_OVR_CONTENT);
    return content ? content : {
        sustainability_overview_content: null,
        sustainability_overview_banner: null,
        sustainability_overview_policy_framework: null,
        sustainability_overview_policy_framework_file: null,
        sustainability_overview_rating: null,
        sustainability_overview_policy_framework_show: null,
        sustainability_overview_rating_show: null,
    }
}

const __getSustainabilityEnvironment = (): PreferenceSustainabilityEnvironment => {
    const content = __getStorage(CACHE_SUSTAIN_ENV_CONTENT);
    return content ? content : {
        sustainability_environment_banner: null,
        sustainability_environment_overview: null
    }
}

const __getSustainabilitySocial = (): PreferenceSustainabilitySocial => {
    const content = __getStorage(CACHE_SUSTAIN_SOCIAL_CONTENT);
    return content ? content : {
        sustainability_social_banner: null,
        sustainability_social_overview: null
    }
}

const __getSustainabilityReport = (): PreferenceSustainabilityReport => {
    const content = __getStorage(CACHE_SUSTAIN_RPT_CONTENT);
    return content ? content : {
        sustainability_report_banner: null
    }
}

const __getSustainabilityGovernance = (): PreferenceSustainabilityGovernance => {
    const content = __getStorage(CACHE_SUSTAIN_GVN_CONTENT);
    return content ? content : {
        sustainability_governance_banner: null,
        sustainability_governance_overview: null
    }
}

const __getSustainabilityAction = (): PreferenceSustainabilityAction => {
    const content = __getStorage(CACHE_SUSTAIN_ACT_CONTENT);
    return content ? content : {
        sustainability_action_banner: null
    }
}

const __getSocialMedia = (): PreferenceSocialMedia => {
    const content = __getStorage(CACHE_SOCIAL_MEDIA);
    return content ? content : {
        social_youtube: null,
        social_linkedin: null,
        social_tiktok: null,
        social_x: null,
        social_instagram: null,
        social_facebook: null,
    }
}

const __getStorage = (KEY: string) => {
    const value = localStorage.getItem(KEY)
    if (!value) {
        return null
    }
    return decrypt(value)
}
