export type PaginateLink = {
    url?: string
    label: string
    active: boolean
    params?: object
}


export type News = {
    id: string;
    title: string;
    image: string;
    date: string;
    category?: string;
}
