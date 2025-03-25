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


export type PreferenceItem = {
    key: string;
    file_url?: any;
    title_en: string;
    title_id: string;
    title: string;
    content_en: string;
    content_id: string;
    content: string;
    content_table: any;
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

export type QuickLink = {
    url: string;
    name: string;
}
