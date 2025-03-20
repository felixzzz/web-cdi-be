<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminOurBusinessContentController extends AdminController
{
    protected $routePath = 'admin.page-management.our-business-content';
    protected $pageActive = 'our-business-content';
    protected $subPageActive = 'what-we-do';
    protected $pageTitle = 'Our Business Content';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.our-business-content.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('', PreferenceKey::getAllOurBusinessKey())
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, PreferenceKey::getAllOurBusinessKey(), 'page-management/our-business');

            return redirect(route('admin.page-management.our-business-content.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
