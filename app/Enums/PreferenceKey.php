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
            'home_journey_info_3' => PreferenceType::TextContent
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
}
