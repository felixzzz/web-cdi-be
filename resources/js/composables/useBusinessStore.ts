import { defineStore } from 'pinia'

import useCrypto from './useCrypto'
import useRequest from './useRequest'
import { OurBusinessDetail } from '@/types/utility'

const { encrypt, decrypt } = useCrypto()

const CACHE_ENERGY_BUSINESS = "energy-business"
const CACHE_WATER_BUSINESS = "water-business"
const CACHE_PORT_STORAGE_BUSINESS = "port-storage-business"
const CACHE_LOGISTIC_BUSINESS = "logistic-business"



export const useBusinessStore = defineStore('our-business', {
    state: () => ({
        energy: __getEnergy(),
        water: __getWater(),
        port_storage: __getPortStorage(),
        logistic: __getLogistic()
    }),
    actions: {
        getEnergy() {
            return useRequest().get(route('api.business.detail', 'energy')).then((result) => {
                this.energy = result.data
                localStorage.setItem(CACHE_ENERGY_BUSINESS, encrypt(result.data))
            })
        },
        getWater() {
            return useRequest().get(route('api.business.detail', 'water')).then((result) => {
                this.water = result.data
                localStorage.setItem(CACHE_WATER_BUSINESS, encrypt(result.data))
            })
        },
        getPortStorage() {
            return useRequest().get(route('api.business.detail', 'port_storage')).then((result) => {
                this.port_storage = result.data
                localStorage.setItem(CACHE_PORT_STORAGE_BUSINESS, encrypt(result.data))
            })
        },
        getLogistic() {
            return useRequest().get(route('api.business.detail', 'logistic')).then((result) => {
                this.logistic = result.data
                localStorage.setItem(CACHE_LOGISTIC_BUSINESS, encrypt(result.data))
            })
        }
    }
})



const __getEnergy = (): OurBusinessDetail | null => {
    const content = __getStorage(CACHE_ENERGY_BUSINESS);
    return content ? content : null
}

const __getWater = (): OurBusinessDetail | null => {
    const content = __getStorage(CACHE_WATER_BUSINESS);
    return content ? content : null
}

const __getPortStorage = (): OurBusinessDetail | null => {
    const content = __getStorage(CACHE_PORT_STORAGE_BUSINESS);
    return content ? content : null
}

const __getLogistic = (): OurBusinessDetail | null => {
    const content = __getStorage(CACHE_LOGISTIC_BUSINESS);
    return content ? content : null
}

const __getStorage = (KEY: string) => {
    const value = localStorage.getItem(KEY)
    if (!value) {
        return null
    }
    return decrypt(value)
}
