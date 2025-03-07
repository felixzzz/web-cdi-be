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


export type Award = {
    title: string;
    image: string;
    date: string;
    categories?: string;
    awarder?: string;
}

export type Certification = {
    title: string;
    image: string;
    approvals: string[];
}


export type BreadcrumbLink = {
    route: any;
    title: string;
}
