<?php

namespace App\Http\Controllers\Api;

use App\Enums\PreferenceKey;
use App\Enums\QuickLinkCategory;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use App\Repositories\Utility\QuickLinkRepository;
use Illuminate\Http\Request;

class ApiUtilityController extends Controller
{
    public function home(PreferenceRepository $preferenceRepository)
    {
        return $preferenceRepository->getAllContentPage("home");
    }

    public function governance(PreferenceRepository $preferenceRepository)
    {
        return $preferenceRepository->getAllContentPage("", PreferenceKey::getAllGovernanceKey());
    }

    public function aboutUs(PreferenceRepository $preferenceRepository, $type)
    {
        return $preferenceRepository->getAllContentPage("", PreferenceKey::getAllAboutUsKey($type));
    }

    public function investor(PreferenceRepository $preferenceRepository)
    {
        return $preferenceRepository->getAllContentPage("", PreferenceKey::getAllInvestorKey());
    }

    public function ourBusiness(PreferenceRepository $preferenceRepository)
    {
        return $preferenceRepository->getAllContentPage("", PreferenceKey::getAllOurBusinessKey());
    }

    public function sustainability(PreferenceRepository $preferenceRepository, $type)
    {
        return $preferenceRepository->getAllContentPage("", PreferenceKey::getSustainabilityKey($type));
    }

    public function quickLink(QuickLinkRepository $quickLinkRepository, $type)
    {
        $category = QuickLinkCategory::Home;
        switch ($type) {
            case 'home':
                $category = QuickLinkCategory::Home;
                break;
            case 'governance':
                $category = QuickLinkCategory::Governance;
                break;
            case 'about-us':
                $category = QuickLinkCategory::AboutUs;
                break;

            default:
                return [];
                break;
        }
        return $quickLinkRepository->getByCategory($category);
    }
}
