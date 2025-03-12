<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\AboutUs\CertificateCategoryAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\AboutUs\CertificateCategory;
use App\Repositories\AboutUs\CertificateCategoryRepository;

;
use Illuminate\Http\Request;

class AdminCertificateCategoryController extends AdminController
{
    protected $routePath = 'admin.awards-and-certificates.certificate-categories';
    protected $pageActive = 'awards-and-certificates';
    protected $subPageActive = 'certificate-categories';
    protected $pageTitle = 'Certificate Category';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.certificate-categories.table", [
            'data' => (new CertificateCategoryRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.certificate-categories.create", [
            'pageTitle' => 'Create Certificate Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CertificateCategoryAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.awards-and-certificates.certificate-categories.index'))->with(['info' => __("admin.success_add")]);
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
        $data = CertificateCategory::findByUlid($id, true);
        return view("admin.pages.about-us.certificate-categories.edit", [
            'data' => $data,
            'pageTitle' => 'Update Certificate Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CertificateCategoryAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.awards-and-certificates.certificate-categories.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificateCategoryAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.awards-and-certificates.certificate-categories.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
