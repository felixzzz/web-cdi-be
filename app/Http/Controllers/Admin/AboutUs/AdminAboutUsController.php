<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\PageManagement\AboutUsContentAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminAboutUsController extends AdminController
{
    protected $routePath = 'admin.page-management.about-us-content.who-we-are';
    protected $pageActive = 'about-us-content';
    protected $subPageActive = '';
    protected $pageTitle = 'About Us Content';


    /**
     * Who We Are Content
     */
    public function whoWeAre()
    {
        return view("admin.pages.page-management.about-us.who-we-are.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('about-us-who-we-are'),
            'pageTitle' => 'About Us - Who We Are Content',
            'subPageActive' => 'about-us-who-we-are'
        ]);
    }

    public function postWhoWeAre(Request $request, AboutUsContentAction $action)
    {
        try {
            $action->store($request, 'who-we-are');

            return redirect()->back()->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Management Content
     */
    public function management()
    {
        return view("admin.pages.page-management.about-us.management.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('about-us-management'),
            'pageTitle' => 'About Us - Management Content',
            'subPageActive' => 'about-us-management'
        ]);
    }

    public function postManagement(Request $request, AboutUsContentAction $action)
    {
        try {
            $action->store($request, 'management');

            return redirect()->back()->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Award Content
     */
    public function award()
    {
        return view("admin.pages.page-management.about-us.award.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('about-us-award'),
            'pageTitle' => 'About Us - Award Content',
            'subPageActive' => 'about-us-award'
        ]);
    }

    public function postAward(Request $request, AboutUsContentAction $action)
    {
        try {
            $action->store($request, 'award');

            return redirect()->back()->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
