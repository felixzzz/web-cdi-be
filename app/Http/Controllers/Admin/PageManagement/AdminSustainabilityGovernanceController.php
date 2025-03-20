<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminSustainabilityGovernanceController extends AdminController
{
    protected $routePath = 'admin.page-management.sustainability-governance';
    protected $pageActive = 'sustainability-content';
    protected $subPageActive = 'sustainability-governance';
    protected $pageTitle = 'Sustainability Governance Content';

    public function index()
    {
        return view("admin.pages.page-management.sustainability-governance.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('', PreferenceKey::getSustainabilityKey('governance'))
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, PreferenceKey::getSustainabilityKey('governance'), 'page-management/sustainability');

            return redirect(route('admin.page-management.sustainability-governance.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
