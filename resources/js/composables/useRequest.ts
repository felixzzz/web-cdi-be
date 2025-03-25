
import axios from 'axios'
import { usePage } from '@inertiajs/vue3'
export default function useRequest() {
    const get = (route: any, params = {}) => {
        return axios.get(route, {
            headers: {
                lang: usePage().props.locale
            },
            ...params
        })
    }

    return {
        get
    }
}
