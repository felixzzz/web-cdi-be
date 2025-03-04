
import { getAllQueryParameter } from "@/Lib/utils"
import { PaginateLink } from "@/types/utility"
import axios from "axios"
import { reactive } from "vue"

export type PaginateProps = {
    route: string
    params?: object
}
export default function usePaginate<T>(config: PaginateProps) {
    const state: {
        items: T[],
        links: PaginateLink[],
        loading: boolean
        total: number
        has_next: boolean
    } = reactive({
        items: [],
        links: [],
        loading: false,
        total: 1,
        has_next: true
    })

    const fetchData = (params?: object,callback?:any) => {
        state.loading = true

        const queryParams = getAllQueryParameter()
        axios.get(config.route, {
            params: {
                ...config.params,
                ...queryParams,
                ...params
            }
        }).then((result) => {
            const data = result.data
            state.items = data.items
            state.links = data.links
            state.total = data.total || 0
            state.has_next = data.has_next || false
            state.loading = false
            if(callback){
                callback()
            }
        }).catch((error) => {
            console.log(`Failed to fetch data from ${config.route}`)
            console.log(error)
        })
    }

    return {
        fetchData,
        state
    }
}
