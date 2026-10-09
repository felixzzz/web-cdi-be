<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\PageManagementAction;
use App\Enums\PreferenceKey;
use App\Helpers\Helper;
use App\Helpers\LlmsDefaultContent;
use App\Helpers\Optimize;
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
        return array_merge([
            PreferenceKey::json_ld_homepage->value,
            PreferenceKey::json_ld_about_us->value,
            PreferenceKey::json_ld_governance->value,
            PreferenceKey::json_ld_sustainability->value,
            PreferenceKey::json_ld_contact_us->value,
            PreferenceKey::json_ld_our_business->value,
            PreferenceKey::llms_txt->value,
            PreferenceKey::llms_full_txt->value,
        ], PreferenceKey::getSeoMetaKeys());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.seo-schema.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('', $this->getSeoSchemaKeys()),
            'defaultLlmsTxt' => LlmsDefaultContent::llmsTxt(),
            'defaultLlmsFullTxt' => LlmsDefaultContent::llmsFullTxt(),
        ]);
    }

    public function store(Request $request, PageManagementAction $action)
    {
        try {
            $action->store($request, $this->getSeoSchemaKeys(), 'page-management/seo-schema');

            $llmsKeys = PreferenceKey::getLlmsKeys();
            Optimize::delete(Helper::getPreferenceCacheKey($llmsKeys, 'en'));
            Optimize::delete(Helper::getPreferenceCacheKey($llmsKeys, 'id'));

            $seoMetaKeys = PreferenceKey::getSeoMetaKeys();
            Optimize::delete(Helper::getPreferenceCacheKey($seoMetaKeys, 'en'));
            Optimize::delete(Helper::getPreferenceCacheKey($seoMetaKeys, 'id'));
            Optimize::delete('api_seo_metadata');

            return redirect(route('admin.page-management.seo-schema.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
