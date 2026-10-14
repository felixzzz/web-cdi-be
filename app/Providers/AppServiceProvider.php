<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::prohibitDestructiveCommands(App::isProduction());

        $contentModels = [
            \App\Models\Utility\Preference::class,
            \App\Models\Utility\QuickLink::class,
            \App\Models\Utility\Country::class,
            \App\Models\Utility\Topic::class,
            \App\Models\Utility\AdditionalFile::class,
            \App\Models\Article\Article::class,
            \App\Models\Article\ArticleCategory::class,
            \App\Models\Article\PressRelease::class,
            \App\Models\AboutUs\AboutUs::class,
            \App\Models\AboutUs\Award::class,
            \App\Models\AboutUs\Certificate::class,
            \App\Models\AboutUs\CertificateCategory::class,
            \App\Models\AboutUs\CompanyProfile::class,
            \App\Models\AboutUs\Guideline::class,
            \App\Models\AboutUs\Membership::class,
            \App\Models\AboutUs\Milestone::class,
            \App\Models\AboutUs\OurHistory::class,
            \App\Models\Data\Institution::class,
            \App\Models\Data\Office::class,
            \App\Models\Data\Team::class,
            \App\Models\Governance\GovernanceCommitte::class,
            \App\Models\Investor\InvestorReport::class,
            \App\Models\OurBusiness\OurBusiness::class,
            \App\Models\OurBusiness\OurBusinessTab::class,
            \App\Models\OurBusiness\OurBusinessContent::class,
            \App\Models\Sustainability\RatingRecognition::class,
            \App\Models\Sustainability\SustainabilityContent::class,
            \App\Models\Sustainability\SustainabilityReport::class,
            \App\Models\Sustainability\SustainabilityResponsible::class,
            \App\Models\Sustainability\SustainabilityTab::class,
            \App\Models\Sustainability\SustainabilityTabItem::class,
        ];

        foreach ($contentModels as $modelClass) {
            if (class_exists($modelClass)) {
                $modelClass::observe(\App\Observers\FrontendRevalidationObserver::class);
            }
        }
    }
}
