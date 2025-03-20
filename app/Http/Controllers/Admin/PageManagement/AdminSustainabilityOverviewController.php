<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminSustainabilityOverviewController extends AdminController
{
    protected $routePath = 'admin.page-management.sustainability-overview';
    protected $pageActive = 'sustainability-content';
    protected $subPageActive = 'sustainability-overview';
    protected $pageTitle = 'Sustainability Overview Content';

    public function index()
    {
        return view("admin.pages.page-management.sustainability-overview.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('', PreferenceKey::getSustainabilityKey('overview'))
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, PreferenceKey::getSustainabilityKey('overview'), 'page-management/sustainability');

            return redirect(route('admin.page-management.sustainability-overview.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
