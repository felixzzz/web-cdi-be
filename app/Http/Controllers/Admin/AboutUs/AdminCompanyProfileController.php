<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\Utility\AdditionalFileAction;
use App\Enums\AdditionalFileType;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utility\AdditionalFileRequest;
use App\Models\Utility\AdditionalFile;
use App\Repositories\AboutUs\CompanyProfileRepository;

;
use Illuminate\Http\Request;

class AdminCompanyProfileController extends AdminController
{
    protected $routePath = 'admin.company-profiles';
    protected $pageActive = 'about-us-content';
    protected $subPageActive = 'about-us-files';
    protected $xsubPageActive = 'company-profile-files';
    protected $pageTitle = 'Company Profile Files';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.company-profiles.table", [
            'data' => (new CompanyProfileRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.company-profiles.create", [
            'pageTitle' => 'Create Company Profile'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdditionalFileRequest $request, AdditionalFileAction $action)
    {
        try {
            $action->store($request, AdditionalFileType::CompanyProfile);

            return redirect(route('admin.company-profiles.index'))->with(['info' => __("admin.success_add")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = AdditionalFile::findByUlid($id, true);
        return view("admin.pages.about-us.company-profiles.edit", [
            'data' => $data,
            'pageTitle' => 'Update Company Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdditionalFileRequest $request, AdditionalFileAction $action, string $id)
    {
        try {
            $action->update($request, $id, AdditionalFileType::CompanyProfile);

            return redirect(route('admin.company-profiles.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalFileAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.company-profiles.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
