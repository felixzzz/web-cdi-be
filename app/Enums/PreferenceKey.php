<?php

namespace App\Enums;

enum PreferenceKey: string
{
    // HOME PAGE
    case home_banner = 'home_banner';
    case home_about_section = 'home_about_section';

    case home_infrastructure_title = 'home_infrastructure_title';
    case home_infrastructure_energy = "home_infrastructure_energy";
    case home_infrastructure_water = "home_infrastructure_water";
    case home_infrastructure_port_storage = "home_infrastructure_port_storage";
    case home_infrastructure_logistic = "home_infrastructure_logistic";

    case home_discover_title = "home_discover_title";
    case home_discover_sustainability = "home_discover_sustainability";
    case home_discover_our_business = "home_discover_our_business";
    case home_discover_investor = "home_discover_investor";
    case home_discover_career = "home_discover_career";

    case home_journey_tagline = "home_journey_tagline";
    case home_journey_content = "home_journey_content";
    case home_journey_info_1 = "home_journey_info_1";
    case home_journey_info_2 = "home_journey_info_2";
    case home_journey_info_3 = "home_journey_info_3";

    case about_us_banner = 'about_us_banner';
    case about_us_company_overview_tagline = 'about_us_company_overview_tagline';
    case about_us_company_overview = 'about_us_company_overview';
    case about_us_company_overview_background = 'about_us_company_overview_background';
    case about_us_vision_mission_tagline = 'about_us_vision_mission_tagline';
    case about_us_vision = 'about_us_vision';
    case about_us_mission = 'about_us_mission';
    case about_us_milestone = 'about_us_milestone';
    case about_us_company_profile = 'about_us_company_profile';

    case about_us_management_banner = 'about_us_management_banner';
    case about_us_management_overview = 'about_us_management_overview';
    case about_us_organization_structure = 'about_us_organization_structure';
    case about_us_corporate_structure = 'about_us_corporate_structure';
    case about_us_corporate_structure_table = 'about_us_corporate_structure_table';
    case about_us_guideline = 'about_us_guideline';

    case about_us_award_banner = 'about_us_award_banner';
    case about_us_award_overview = 'about_us_award_overview';

    case investor_report_banner = 'investor_report_banner';
    case investor_report_overview = 'investor_report_overview';
    case investor_report_table = 'investor_report_table';
    case investor_financial_banner = 'investor_financial_banner';
    case investor_share_banner = 'investor_share_banner';
    case investor_share_shareholders_table = 'investor_share_shareholders_table';
    case investor_share_dividend_table = 'investor_share_dividend_table';
    case investor_publication_banner = 'investor_publication_banner';

    case governance_banner = 'governance_banner';
    case governance_corporate_secretary_team = 'governance_corporate_secretary_team';
    case governance_corporate_secretary = 'governance_corporate_secretary';
    case governance_internal_audit_unit = 'governance_internal_audit_unit';
    case governance_audit_committe = 'governance_audit_committe';
    case governance_audit_committe_member_text = 'governance_audit_committe_member_text';
    case governance_sustainability_committe = 'governance_sustainability_committe';
    case governance_risk_management = 'governance_risk_management';
    case governance_code_of_conduct = 'governance_code_of_conduct';
    case governance_she_regulation = 'governance_she_regulation';
    case governance_policy = 'governance_policy';
    case governance_whistleblowing = 'governance_whistleblowing';

    case our_business_banner = 'our_business_banner';
    case our_business_overview = 'our_business_overview';

    public function type()
    {
        return match ($this->value) {
            'home_banner' => PreferenceType::TextContentVideo,
            'home_about_section' => PreferenceType::TextContentImage,
            'home_infrastructure_title' => PreferenceType::Text,
            'home_infrastructure_energy' => PreferenceType::TextContentImage,
            'home_infrastructure_water' => PreferenceType::TextContentImage,
            'home_infrastructure_port_storage' => PreferenceType::TextContentImage,
            'home_infrastructure_logistic' => PreferenceType::TextContentImage,
            'home_discover_title' => PreferenceType::Text,
            'home_discover_sustainability' => PreferenceType::TextContentImage,
            'home_discover_our_business' => PreferenceType::TextContentImage,
            'home_discover_investor' => PreferenceType::TextContentImage,
            'home_discover_career' => PreferenceType::TextContentImage,
            'home_journey_tagline' => PreferenceType::Text,
            'home_journey_content' => PreferenceType::TextContentImage,
            'home_journey_info_1' => PreferenceType::TextContent,
            'home_journey_info_2' => PreferenceType::TextContent,
            'home_journey_info_3' => PreferenceType::TextContent,

            'about_us_banner' => PreferenceType::TextContentImage,
            'about_us_company_overview_tagline' => PreferenceType::TextImage,
            'about_us_company_overview' => PreferenceType::TextContentImage,
            'about_us_company_overview_background' => PreferenceType::Image,
            'about_us_vision_mission_tagline' => PreferenceType::Text,
            'about_us_vision' => PreferenceType::TextContent,
            'about_us_mission' => PreferenceType::TextContent,
            'about_us_milestone' => PreferenceType::TextContent,
            'about_us_company_profile' => PreferenceType::TextContent,
            'about_us_management_banner' => PreferenceType::TextContent,
            'about_us_management_overview' => PreferenceType::TextContent,
            'about_us_organization_structure' => PreferenceType::Image,
            'about_us_corporate_structure' => PreferenceType::Image,
            'about_us_corporate_structure_table' => PreferenceType::Table,
            'about_us_guideline' => PreferenceType::TextContent,
            'about_us_award_banner' => PreferenceType::TextContentImage,
            'about_us_award_overview' => PreferenceType::TextContent,

            'investor_report_banner' => PreferenceType::TextContentImage,
            'investor_report_overview' => PreferenceType::TextContentImage,
            'investor_report_table' => PreferenceType::Table,
            'investor_financial_banner' => PreferenceType::TextContentImage,
            'investor_share_banner' => PreferenceType::TextContentImage,
            'investor_share_shareholders_table' => PreferenceType::Table,
            'investor_share_dividend_table' => PreferenceType::Table,
            'investor_publication_banner' => PreferenceType::TextContentImage,

            'governance_banner' => PreferenceType::TextContentImage,
            'governance_corporate_secretary_team' => PreferenceType::TextContentImage,
            'governance_corporate_secretary' => PreferenceType::TextContent,
            'governance_internal_audit_unit' => PreferenceType::TextContentImage,
            'governance_audit_committe' => PreferenceType::TextContent,
            'governance_audit_committe_member_text' => PreferenceType::TextContent,
            'governance_sustainability_committe' => PreferenceType::Image,
            'governance_risk_management' => PreferenceType::TextContentImage,
            'governance_code_of_conduct' => PreferenceType::TextContent,
            'governance_she_regulation' => PreferenceType::TextContent,
            'governance_policy' => PreferenceType::TextContent,
            'governance_whistleblowing' => PreferenceType::TextContentImage,

            'our_business_banner' => PreferenceType::TextContentImage,
            'our_business_overview' => PreferenceType::TextContent,

            default => PreferenceType::Text
        };
    }


    public static function getAllHomeKey()
    {
        return [
            self::home_banner->value,
            self::home_about_section->value,
            self::home_infrastructure_title->value,
            self::home_infrastructure_energy->value,
            self::home_infrastructure_water->value,
            self::home_infrastructure_port_storage->value,
            self::home_infrastructure_logistic->value,
            self::home_discover_title->value,
            self::home_discover_sustainability->value,
            self::home_discover_our_business->value,
            self::home_discover_investor->value,
            self::home_discover_career->value,
            self::home_journey_tagline->value,
            self::home_journey_content->value,
            self::home_journey_info_1->value,
            self::home_journey_info_2->value,
            self::home_journey_info_3->value
        ];
    }

    public static function getAllAboutUsKey($type)
    {
        if ($type == 'who-we-are') {
            return [
                self::about_us_banner->value,
                self::about_us_company_overview_tagline->value,
                self::about_us_company_overview->value,
                self::about_us_company_overview_background->value,
                self::about_us_vision_mission_tagline->value,
                self::about_us_vision->value,
                self::about_us_mission->value,
                self::about_us_milestone->value,
                self::about_us_company_profile->value
            ];
        }

        if ($type == 'management') {
            return [
                self::about_us_management_banner->value,
                self::about_us_management_overview->value,
                self::about_us_organization_structure->value,
                self::about_us_corporate_structure->value,
                self::about_us_corporate_structure_table->value,
                self::about_us_guideline->value
            ];
        }

        if ($type == 'award') {
            return [
                self::about_us_award_banner->value,
                self::about_us_award_overview->value
            ];
        }

        if ($type == 'investor') {
            return [
                self::investor_report_banner->value,
                self::investor_report_overview->value,
                self::investor_report_table->value,
                self::investor_financial_banner->value,
                self::investor_share_banner->value,
                self::investor_share_shareholders_table->value,
                self::investor_share_dividend_table->value,
                self::investor_publication_banner->value
            ];
        }

        return [];
    }

    public static function getAllInvestorKey()
    {
        return [
            self::investor_report_banner->value,
            self::investor_report_overview->value,
            self::investor_report_table->value,
            self::investor_financial_banner->value,
            self::investor_share_banner->value,
            self::investor_share_shareholders_table->value,
            self::investor_share_dividend_table->value,
            self::investor_publication_banner->value
        ];
    }

    public static function getAllGovernanceKey()
    {
        return [
            self::governance_banner->value,
            self::governance_corporate_secretary_team->value,
            self::governance_corporate_secretary->value,
            self::governance_internal_audit_unit->value,
            self::governance_audit_committe->value,
            self::governance_audit_committe_member_text->value,
            self::governance_sustainability_committe->value,
            self::governance_risk_management->value,
            self::governance_code_of_conduct->value,
            self::governance_she_regulation->value,
            self::governance_policy->value,
            self::governance_whistleblowing->value
        ];
    }

    public static function getAllOurBusinessKey()
    {
        return [
            self::our_business_banner->value,
            self::our_business_overview->value
        ];
    }
}
