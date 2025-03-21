<?php

use App\Http\Controllers\Admin\AboutUs\AdminAboutUsController;
use App\Http\Controllers\Admin\AboutUs\AdminAwardController;
use App\Http\Controllers\Admin\AboutUs\AdminCertificateCategoryController;
use App\Http\Controllers\Admin\AboutUs\AdminCertificateController;
use App\Http\Controllers\Admin\AboutUs\AdminCompanyProfileController;
use App\Http\Controllers\Admin\AboutUs\AdminGuidelineController;
use App\Http\Controllers\Admin\AboutUs\AdminMembershipController;
use App\Http\Controllers\Admin\AboutUs\AdminMilestoneController;
use App\Http\Controllers\Admin\AboutUs\AdminOurHistoryController;
use App\Http\Controllers\Admin\Article\AdminArticleCategoryController;
use App\Http\Controllers\Admin\Article\AdminBlogController;
use App\Http\Controllers\Admin\Article\AdminNewsController;
use App\Http\Controllers\Admin\Article\AdminPressReleaseController;
use App\Http\Controllers\Admin\Data\AdminInstitutionController;
use App\Http\Controllers\Admin\Data\AdminOfficeController;
use App\Http\Controllers\Admin\Data\AdminTeamController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Inbox\AdminContactUsController;
use App\Http\Controllers\Admin\Inbox\AdminWhistleblowingController;
use App\Http\Controllers\Admin\Investor\AdminInvestorReportController;
use App\Http\Controllers\Admin\OurBusiness\AdminOurBusinessListController;
use App\Http\Controllers\Admin\OurBusiness\AdminOurBusinessTabContentController;
use App\Http\Controllers\Admin\OurBusiness\AdminOurBusinessTabController;
use App\Http\Controllers\Admin\PageManagement\AdminGovernanceContentController;
use App\Http\Controllers\Admin\PageManagement\AdminGovernanceFileController;
use App\Http\Controllers\Admin\PageManagement\AdminHomeContentController;
use App\Http\Controllers\Admin\PageManagement\AdminInvestorController;
use App\Http\Controllers\Admin\PageManagement\AdminOurBusinessContentController;
use App\Http\Controllers\Admin\PageManagement\AdminSustainabilityEnvironmentController;
use App\Http\Controllers\Admin\PageManagement\AdminSustainabilityGovernanceController;
use App\Http\Controllers\Admin\PageManagement\AdminSustainabilityOverviewController;
use App\Http\Controllers\Admin\PageManagement\AdminSustainabilityReportController;
use App\Http\Controllers\Admin\PageManagement\AdminSustainabilitySocialController;
use App\Http\Controllers\Admin\Role\AdminRoleController;
use App\Http\Controllers\Admin\Sustainability\AdminRatingRecognitionController;
use App\Http\Controllers\Admin\Sustainability\AdminSustainabilityContentController;
use App\Http\Controllers\Admin\Sustainability\AdminSustainabilityResponsibleController;
use App\Http\Controllers\Admin\Sustainability\AdminSustainabilityTabController;
use App\Http\Controllers\Admin\Sustainability\AdminSustainabilityTabItemController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Utility\AdminCountryController;
use App\Http\Controllers\Admin\Utility\AdminEditorController;
use App\Http\Controllers\Admin\Utility\AdminQuickLinkController;
use App\Http\Controllers\Admin\Utility\AdminTopicController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AuthSession;
use App\Http\Middleware\GuestSession;
use App\Http\Middleware\OnlySuperadminMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
->as("admin.")
->group(function () {
    Route::middleware(GuestSession::class)->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(AuthSession::class)->group(function () {
        Route::get("/dashboard", [HomeController::class, 'index'])->name("dashboard");

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        Route::resource('roles', AdminRoleController::class)->middleware([OnlySuperadminMiddleware::class]);
        Route::resource('users', AdminUserController::class)->middleware([OnlySuperadminMiddleware::class]);


        Route::resource('quick-links', AdminQuickLinkController::class)->except(['show']);
        Route::post('/quick-links/sort', [AdminQuickLinkController::class, 'updateSort'])->name('quick-links.sort');

        Route::resource('article-categories', AdminArticleCategoryController::class);
        Route::prefix('article/')->as('article.')->group(function () {
            Route::resource('news', AdminNewsController::class)->except(['show']);
            Route::resource('blog', AdminBlogController::class)->except(['show']);
            Route::resource('press-releases', AdminPressReleaseController::class)->except(['show']);
        });

        Route::prefix('investor/')->as('investor.')->group(function () {
            Route::resource('reports', AdminInvestorReportController::class)->except(['show']);
        });

        Route::resource('topics', AdminTopicController::class)->except(['show']);
        Route::resource('countries', AdminCountryController::class)->except(['show']);

        Route::prefix('inbox/')->as('inbox.')->group(function () {
            Route::resource('contact-us', AdminContactUsController::class)->only(['index', 'show', 'destroy']);
            Route::resource('whistleblowing', AdminWhistleblowingController::class)->only(['index', 'show', 'destroy']);
        });

        Route::resource('offices', AdminOfficeController::class)->except(['show']);
        Route::resource('teams', AdminTeamController::class)->except(['show']);

        Route::controller(AdminEditorController::class)
        ->prefix('editor')
        ->as('editor.')
        ->group(function () {
            Route::get('/token', 'token')->name('token');
            Route::post('/upload', 'upload')->name('upload')->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);;
        });

        Route::resource('milestones', AdminMilestoneController::class)->except(['show']);
        Route::resource('our-histories', AdminOurHistoryController::class)->except(['show']);
        Route::resource('company-profiles', AdminCompanyProfileController::class)->except(['show']);
        Route::resource('guidelines', AdminGuidelineController::class)->except(['show']);
        Route::prefix('awards-and-certificates/')->as('awards-and-certificates.')->group(function () {
            Route::resource('certificate-categories', AdminCertificateCategoryController::class)->except(["show"]);
            Route::resource('certificates', AdminCertificateController::class)->except(["show"]);
            Route::post('certificates/delete-image', [AdminCertificateController::class, 'deleteImage'])->name("certificates.deleteImage");
            Route::resource('awards', AdminAwardController::class)->except(["show"]);
            Route::resource('memberships', AdminMembershipController::class)->except(["show"]);
        });


        Route::resource('institutions', AdminInstitutionController::class)->except(['show']);

        Route::resource('rating-recognitions', AdminRatingRecognitionController::class)->except(['show']);
        Route::post('/rating-recognitions/sort', [AdminRatingRecognitionController::class, 'updateSort'])->name('rating-recognitions.sort');
        Route::resource('responsibles', AdminSustainabilityResponsibleController::class)->except(['show', 'create', 'store', 'destroy']);

        Route::prefix("/sustainability-tabs/{category}")->as("sustainability-tabs.")->group(function () {
            Route::get("/", [AdminSustainabilityTabController::class, "index"])->name("index");
            Route::get("/create", [AdminSustainabilityTabController::class, "create"])->name("create");
            Route::post("/", [AdminSustainabilityTabController::class, "store"])->name("store");
            Route::get("/{tabId}/edit", [AdminSustainabilityTabController::class, "edit"])->name("edit");
            Route::put("/{tabId}", [AdminSustainabilityTabController::class, "update"])->name("update");
            Route::delete("/{tabId}", [AdminSustainabilityTabController::class, "destroy"])->name("destroy");
            Route::post('/sort', [AdminSustainabilityTabController::class, 'updateSort'])->name('sort');

            Route::prefix("{tabId}/items")->as("items.")->group(function () {
                Route::get("/", [AdminSustainabilityTabItemController::class, "index"])->name("index");
                Route::get("/create", [AdminSustainabilityTabItemController::class, "create"])->name("create");
                Route::post("/", [AdminSustainabilityTabItemController::class, "store"])->name("store");
                Route::get("/{itemId}/edit", [AdminSustainabilityTabItemController::class, "edit"])->name("edit");
                Route::put("/{itemId}", [AdminSustainabilityTabItemController::class, "update"])->name("update");
                Route::delete("/{itemId}", [AdminSustainabilityTabItemController::class, "destroy"])->name("destroy");
                Route::post('/sort', [AdminSustainabilityTabItemController::class, 'updateSort'])->name('sort');
            });
        })->whereIn("category", ["environment", "social", "governance"]);

        Route::prefix("/sustainability-contents/{category}")->as("sustainability-contents.")->group(function () {
            Route::get("/", [AdminSustainabilityContentController::class, "index"])->name("index");
            Route::get("/create", [AdminSustainabilityContentController::class, "create"])->name("create");
            Route::post("/", [AdminSustainabilityContentController::class, "store"])->name("store");
            Route::get("/{tabId}/edit", [AdminSustainabilityContentController::class, "edit"])->name("edit");
            Route::put("/{tabId}", [AdminSustainabilityContentController::class, "update"])->name("update");
            Route::delete("/{tabId}", [AdminSustainabilityContentController::class, "destroy"])->name("destroy");
            Route::post('/sort', [AdminSustainabilityContentController::class, 'updateSort'])->name('sort');
            Route::post('/element/{type}', [AdminSustainabilityContentController::class, 'element'])->name('element');
        })->whereIn("category", ["environment", "social", "governance"]);

        Route::prefix('page-management/')->as('page-management.')->group(function () {
            Route::get("/home-content", [AdminHomeContentController::class, 'index'])->name("home-content.index");
            Route::post("/home-content", [AdminHomeContentController::class, 'store'])->name("home-content.store");

            Route::prefix('about-us/')->as('about-us-content.')->group(function () {
                Route::get("who-we-are", [AdminAboutUsController::class, 'whoWeAre'])->name("who-we-are.index");
                Route::post("who-we-are", [AdminAboutUsController::class, 'postWhoWeAre'])->name("who-we-are.store");

                Route::get("management", [AdminAboutUsController::class, 'management'])->name("management.index");
                Route::post("management", [AdminAboutUsController::class, 'postManagement'])->name("management.store");

                Route::get("award", [AdminAboutUsController::class, 'award'])->name("award.index");
                Route::post("award", [AdminAboutUsController::class, 'postAward'])->name("award.store");
            });

            Route::get("/investor-content", [AdminInvestorController::class, 'index'])->name("investor-content.index");
            Route::post("/investor-content", [AdminInvestorController::class, 'store'])->name("investor-content.store");

            Route::get("/governance-content", [AdminGovernanceContentController::class, 'index'])->name("governance-content.index");
            Route::post("/governance-content", [AdminGovernanceContentController::class, 'store'])->name("governance-content.store");

            Route::resource("governance-files", AdminGovernanceFileController::class);
            Route::post('/governance-files/sort', [AdminGovernanceFileController::class, 'updateSort'])->name('governance-files.sort');

            Route::get("/our-business-content", [AdminOurBusinessContentController::class, 'index'])->name("our-business-content.index");
            Route::post("/our-business-content", [AdminOurBusinessContentController::class, 'store'])->name("our-business-content.store");
            Route::resource("/our-business-list", AdminOurBusinessListController::class)->except(["create", "store", "destroy", "show"]);

            Route::prefix("{id}/our-business-tabs")->as("our-business-tabs.")->group(function () {
                Route::get("/", [AdminOurBusinessTabController::class, "index"])->name("index");
                Route::get("/create", [AdminOurBusinessTabController::class, "create"])->name("create");
                Route::post("/", [AdminOurBusinessTabController::class, "store"])->name("store");
                Route::get("/{ourBusinessTab}/edit", [AdminOurBusinessTabController::class, "edit"])->name("edit");
                Route::put("/{ourBusinessTab}", [AdminOurBusinessTabController::class, "update"])->name("update");
                Route::delete("/{ourBusinessTab}", [AdminOurBusinessTabController::class, "destroy"])->name("destroy");
                Route::post('/sort', [AdminOurBusinessTabController::class, 'updateSort'])->name('sort');

                Route::prefix("{ourBusinessTab}/contents")->as("contents.")->group(function () {
                    Route::get("/", [AdminOurBusinessTabContentController::class, "index"])->name("index");
                    Route::get("/create", [AdminOurBusinessTabContentController::class, "create"])->name("create");
                    Route::post("/", [AdminOurBusinessTabContentController::class, "store"])->name("store");
                    Route::get("/{contentId}/edit", [AdminOurBusinessTabContentController::class, "edit"])->name("edit");
                    Route::put("/{contentId}", [AdminOurBusinessTabContentController::class, "update"])->name("update");
                    Route::delete("/{contentId}", [AdminOurBusinessTabContentController::class, "destroy"])->name("destroy");
                    Route::post('/sort', [AdminOurBusinessTabContentController::class, 'updateSort'])->name('sort');
                });
            });

            Route::get("/sustainability-overview", [AdminSustainabilityOverviewController::class, 'index'])->name("sustainability-overview.index");
            Route::post("/sustainability-overview", [AdminSustainabilityOverviewController::class, 'store'])->name("sustainability-overview.store");

            Route::get("/sustainability-environment", [AdminSustainabilityEnvironmentController::class, 'index'])->name("sustainability-environment.index");
            Route::post("/sustainability-environment", [AdminSustainabilityEnvironmentController::class, 'store'])->name("sustainability-environment.store");

            Route::get("/sustainability-social", [AdminSustainabilitySocialController::class, 'index'])->name("sustainability-social.index");
            Route::post("/sustainability-social", [AdminSustainabilitySocialController::class, 'store'])->name("sustainability-social.store");

            Route::get("/sustainability-governance", [AdminSustainabilityGovernanceController::class, 'index'])->name("sustainability-governance.index");
            Route::post("/sustainability-governance", [AdminSustainabilityGovernanceController::class, 'store'])->name("sustainability-governance.store");

            Route::get("/sustainability-report", [AdminSustainabilityReportController::class, 'index'])->name("sustainability-report.index");
            Route::post("/sustainability-report", [AdminSustainabilityReportController::class, 'store'])->name("sustainability-report.store");
        });
    });
});
