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

export type SustainabilityFile = {
    id: string | number;
    title: string;
    image?: string;
    description: string;
    size: string;
}

type SustainabilityContentGrid = {
    number?: number;
    icon: string;
    title?: string;
    description: string;
}

export type SustainabilityContent = {
    background?: '' | 'normal' | 'darkest',
    type?: 'content' | 'grid'  | 'simple_text_information' | 'file_information' | 'list_information' | 'content_points' | 'content_swiper';
    title?: string;
    image?: string;
    align?: string;
    grid_direction?: string | 'row' | 'col';
    grid_pattern?: '' | 'normal' | 'zig-zag';
    grid_type?: '' | 'icon_content_card' | 'icon_list_card' | 'box_icon_card' | 'image_content_card' | 'featured_image_card';
    content?: string;
    content_grid?: SustainabilityContentGrid[],
    file_information?: SustainabilityFile
}
