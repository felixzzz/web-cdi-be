<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Http\Controllers\AdminController;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminSeoSchemaController extends AdminController
{
    protected $routePath = 'admin.page-management.seo-schema';
    protected $pageActive = 'seo-schema';
    protected $pageTitle = 'SEO & Schema Markup';

    protected function getSeoSchemaKeys(): array
    {
        return [
            PreferenceKey::json_ld_homepage->value,
            PreferenceKey::json_ld_about_us->value,
            PreferenceKey::json_ld_governance->value,
            PreferenceKey::json_ld_sustainability->value,
            PreferenceKey::json_ld_contact_us->value,
            PreferenceKey::json_ld_our_business->value,
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.seo-schema.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('', $this->getSeoSchemaKeys())
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, $this->getSeoSchemaKeys(), 'page-management/seo-schema');

            return redirect(route('admin.page-management.seo-schema.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
