
import { getAllQueryParameter, scrollToSection } from "@/Lib/utils"
import { PaginateLink } from "@/types/utility"
import { reactive } from "vue"
import useRequest from "./useRequest"

export type PaginateProps = {
    route: string
    params?: object,
    scroll?: string
}
export default function usePaginate<T>(config: PaginateProps) {
    const state: {
        items: T[],
        links: PaginateLink[],
        loading: boolean
        total: number
        has_next: boolean,
        fetch_count: number
    } = reactive({
        items: [],
        links: [],
        loading: false,
        total: 1,
        has_next: true,
        fetch_count: 0
    })

    const fetchData = (params?: object,callback?:any) => {
        state.loading = true

        const queryParams = getAllQueryParameter()
        useRequest().get(config.route, {
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

            if (config.scroll && state.fetch_count > 0) {
                scrollToSection(config.scroll)
            }

            state.fetch_count++
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
