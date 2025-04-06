export type NameId = {
    id: string;
    name: string;
}

export type PaginateLink = {
    url?: string
    label: string
    active: boolean
    params?: object
}

export type PaginationMeta = {
    total?: number;
    per_page?: number;
    current_page?: number;
    last_page?: number;
    from?: number;
    to?: number;
    range?: string;
}

export type NewsCategory = {
    id: string;
    ulid: string;
    name: string;
}

export type News = {
    id: string;
    ulid?: string;
    slug?: string;
    title: string;
    image: string;
    date: string;
    category_name?: string;
    content?: string;
    short_content?: string;
    tags?: string[];
}

export type LatestBannerNews = {
    title: string;
    data: News
}


export type Award = {
    name: string;
    image: string;
    year: string;
    content?: string;
    awarder?: string;
}

export type Certification = {
    ulid: string;
    date: string;
    name: string;
    content?: string;
    short_content?: string;
    awarder?: string;
    category_name?: string;
    files?: string[];
    thumbnail?: string;
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

export type PreferenceTable = {
    headers: {
        text?: string;
    }[],
    tableData: {
        text?: string;
        sub_text?: string;
        is_group?: boolean;
        label?: {
            text?: string;
        }
    }[][]
}

export type PreferenceItem = {
    key: string;
    file_url?: any;
    title_en: string;
    title_id: string;
    title: string;
    content_en: string;
    content_id: string;
    content: string;
    content_table_trans?: PreferenceTable;
    content_table?: any;
}

export type PreferenceHome = {
    home_banner: PreferenceItem | null;
    home_about_section: PreferenceItem | null;
    home_infrastructure_title: PreferenceItem | null;
    home_infrastructure_energy: PreferenceItem | null;
    home_infrastructure_water: PreferenceItem | null;
    home_infrastructure_port_storage: PreferenceItem | null;
    home_infrastructure_logistic: PreferenceItem | null;
    home_discover_title: PreferenceItem | null;
    home_discover_sustainability: PreferenceItem | null;
    home_discover_our_business: PreferenceItem | null;
    home_discover_investor: PreferenceItem | null;
    home_discover_career: PreferenceItem | null;
    home_journey_tagline: PreferenceItem | null;
    home_journey_content: PreferenceItem | null;
    home_journey_info_1: PreferenceItem | null;
    home_journey_info_2: PreferenceItem | null;
    home_journey_info_3: PreferenceItem | null;
}

export type PreferenceGovernance = {
    governance_banner: PreferenceItem | null;
    governance_corporate_secretary_team: PreferenceItem | null;
    governance_corporate_secretary: PreferenceItem | null;
    governance_internal_audit_unit: PreferenceItem | null;
    governance_audit_committe: PreferenceItem | null;
    governance_audit_committe_member_text: PreferenceItem | null;
    governance_sustainability_committe: PreferenceItem | null;
    governance_risk_management: PreferenceItem | null;
    governance_code_of_conduct: PreferenceItem | null;
    governance_she_regulation: PreferenceItem | null;
    governance_policy: PreferenceItem | null;
    governance_whistleblowing: PreferenceItem | null;
    governance_whistleblowing_detail: PreferenceItem | null;
}

export type PreferenceAboutAward = {
    about_us_award_banner: PreferenceItem | null;
    about_us_award_overview: PreferenceItem | null;
}

export type PreferenceAboutManagement = {
    about_us_management_banner: PreferenceItem | null;
    about_us_management_overview: PreferenceItem | null;
    about_us_organization_structure: PreferenceItem | null;
    about_us_corporate_structure: PreferenceItem | null;
    about_us_corporate_structure_table: PreferenceItem | null;
    about_us_guideline: PreferenceItem | null;
}

export type PreferenceAboutOverview = {
    about_us_banner: PreferenceItem | null;
    about_us_company_overview_tagline: PreferenceItem | null;
    about_us_company_overview: PreferenceItem | null;
    about_us_company_overview_background: PreferenceItem | null;
    about_us_vision_mission_tagline: PreferenceItem | null;
    about_us_vision: PreferenceItem | null;
    about_us_mission: PreferenceItem | null;
    about_us_milestone: PreferenceItem | null;
    about_us_company_profile: PreferenceItem | null;
}

export type PreferenceOurBusiness = {
    our_business_banner: PreferenceItem | null;
    our_business_overview: PreferenceItem | null;
}

export type PreferenceInvestor = {
    investor_report_banner: PreferenceItem | null;
    investor_report_overview: PreferenceItem | null;
    investor_report_table: PreferenceItem | null;
    investor_financial_banner: PreferenceItem | null;
    investor_share_banner: PreferenceItem | null;
    investor_share_shareholders_table: PreferenceItem | null;
    investor_share_dividend_table: PreferenceItem | null;
    investor_share_bonds_table: PreferenceItem | null;
    investor_publication_banner: PreferenceItem | null;
    investor_share_tab_one: PreferenceItem | null;
    investor_share_tab_two: PreferenceItem | null;
}

export type QuickLink = {
    url: string;
    name: string;
}

export type Milestone = {
    ulid: string;
    year: string;
    content: string;
}

export type OurHistory = {
    image: string;
    tagline: string;
    title: string;
    content: string;
}

export type AdditionalFile = {
    name: string;
    file: {
        path: string;
        size: string;
        format: string;
    }
}

export type Team = {
    name: string;
    image: string;
    position: string;
}

export type InvestorReport = {
    type: string;
    name: string;
    date: string;
    file: {
        path: string;
        size: string;
        format: string;
    }
}


export type OfficeLocation = {
    location_name?: string;
    address?: string;
    phone?: string;
    fax?: string;
}

export type Office = {
    name: string;
    localized_main: OfficeLocation;
    sub_title?: string;
    localized_branches: OfficeLocation[]
}


export type PressRelease = {
    id: string;
    ulid?: string;
    name: string;
    file?: {
        path: string;
        size: string;
        format: string;
    };
    file_en?: {
        path: string;
        size: string;
        format: string;
    };
    file_id?: {
        path: string;
        size: string;
        format: string;
    };
    date: string;
}

export type OurBusinessOverviewList = {
    title: string;
    image: string;
    description?: string;
    route: string;
    tabs?: {
        ulid: string;
        title: string;
    }[];
}

export type OurBusinessContent = {
    name: string;
    heading?: string;
    heading_position?: string;
    align?: string;
    tagline?: string;
    title?: string;
    description?: string;
    image?: string;
}

export type OurBusinessTab = {
    ulid: string;
    title: string;
    sub_title?: string;
    description?: string;
    image?: string;
    contents?: OurBusinessContent[]
}

export type OurBusinessDetail = {
    title: string;
    image: string;
    description?: string;
    banner_title?: string;
    banner_image?: string;
    banner_description?: string;
    overview_title?: string;
    overview_image?: string;
    overview_description?: string;
    heading_tab_title?: string;
    tabs?: OurBusinessTab[];
}

export type FinancialCalendarList = {
    year: string;
    items: PressRelease[]
}
