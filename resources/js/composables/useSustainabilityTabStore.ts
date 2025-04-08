import { defineStore } from 'pinia'

import useCrypto from './useCrypto'
import useRequest from './useRequest'
import { SustainabilityTab } from '@/types/utility'

const { encrypt, decrypt } = useCrypto()

const CACHE_SUSTAINABILITY_SOCIAL = "sustainability-tab-social"
const CACHE_SUSTAINABILITY_ENVIRONMENT = "sustainability-tab-environment"
const CACHE_SUSTAINABILITY_GOVERNANCE = "sustainability-tab-governance"



export const useSustainabilityTabStore = defineStore('sustainability-tab', {
    state: () => ({
        social: __getSocial(),
        environment: __getEnvironment(),
        governance: __getGovernance()
    }),
    actions: {
        getSocial() {
            return useRequest().get(route('api.sustainability.tab-contents', 'social')).then((result) => {
                this.social = result.data
                localStorage.setItem(CACHE_SUSTAINABILITY_SOCIAL, encrypt(result.data))
            })
        },
        getEnvironment() {
            return useRequest().get(route('api.sustainability.tab-contents', 'environment')).then((result) => {
                this.environment = result.data
                localStorage.setItem(CACHE_SUSTAINABILITY_ENVIRONMENT, encrypt(result.data))
            })
        },
        getGovernance() {
            return useRequest().get(route('api.sustainability.tab-contents', 'governance')).then((result) => {
                this.governance = result.data
                localStorage.setItem(CACHE_SUSTAINABILITY_GOVERNANCE, encrypt(result.data))
            })
        }
    }
})



const __getSocial = (): SustainabilityTab[] | null => {
    const content = __getStorage(CACHE_SUSTAINABILITY_SOCIAL);
    return content ? content : null
}

const __getEnvironment = (): SustainabilityTab[] | null => {
    const content = __getStorage(CACHE_SUSTAINABILITY_ENVIRONMENT);
    return content ? content : null
}

const __getGovernance = (): SustainabilityTab[] | null => {
    const content = __getStorage(CACHE_SUSTAINABILITY_GOVERNANCE);
    return content ? content : null
}

const __getStorage = (KEY: string) => {
    const value = localStorage.getItem(KEY)
    if (!value) {
        return null
    }
    return decrypt(value)
}
