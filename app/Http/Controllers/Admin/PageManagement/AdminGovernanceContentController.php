<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\HomeContentAction;
use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminGovernanceContentController extends AdminController
{
    protected $routePath = 'admin.page-management.governance-content';
    protected $pageActive = 'governance-content';
    protected $subPageActive = '';
    protected $pageTitle = 'Governance Content';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.governance-content.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('governance')
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, PreferenceKey::getAllGovernanceKey(), 'page-management/governance');

            return redirect(route('admin.page-management.governance-content.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
