<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UtilityController extends Controller
{
    public function switchLang($locale, Request $request)
    {
        if (!in_array($locale, ['en', 'id'])) {
            abort(400);
        }

        session(['locale' => $locale]);
        return back();
    }

    public function privacy()
    {
        return Inertia::render("Utility/UtilityPage", [
            "title" => __("head_title.privacy_policy"),
            "type" => "privacy-policy"
        ]);
    }

    public function cookie()
    {
        return Inertia::render("Utility/UtilityPage", [
            "title" => __("head_title.cookies_consent"),
            "type" => "cookies-consent"
        ]);
    }

    public function term()
    {
        return Inertia::render("Utility/UtilityPage", [
            "title" => __("head_title.terms_and_conditions"),
            "type" => "terms-and-conditions"
        ]);
    }

    public function disclaimer()
    {
        return Inertia::render("Utility/UtilityPage", [
            "title" => __("head_title.disclaimer"),
            "type" => "disclaimer"
        ]);
    }
}
