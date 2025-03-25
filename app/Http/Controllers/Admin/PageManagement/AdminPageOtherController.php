<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminPageOtherController extends AdminController
{
    protected $routePath = 'admin.page-management.other-content';
    protected $pageActive = 'other-content';
    protected $pageTitle = 'Other Content';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.other-content.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('', PreferenceKey::getOtherKeys())
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, PreferenceKey::getOtherKeys(), 'page-management/other');

            return redirect(route('admin.page-management.other-content.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
