<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\AboutUs\Certificate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AdminController;
use App\Actions\AboutUs\CertificateAction;
use App\Http\Requests\AboutUs\CertificateRequest;

;
use App\Repositories\AboutUs\CertificateRepository;
use App\Repositories\AboutUs\CertificateCategoryRepository;

class AdminCertificateController extends AdminController
{
    protected $routePath = 'admin.awards-and-certificates.awards';
    protected $pageActive = 'about-us-content';
    protected $subPageActive = 'awards-and-certificates';
    protected $xsubPageActive = 'certificates';
    protected $pageTitle = 'Certificate';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.certificates.table", [
            'data' => (new CertificateRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.certificates.create", [
            'pageTitle' => 'Create Certificate',
            'categories' => (new CertificateCategoryRepository())->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request, CertificateAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.awards-and-certificates.certificates.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Certificate::findByUlid($id, true);
        return view("admin.pages.about-us.certificates.edit", [
            'data' => $data,
            'categories' => (new CertificateCategoryRepository())->list(),
            'pageTitle' => 'Update Certificate'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateRequest $request, CertificateAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.awards-and-certificates.certificates.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CertificateAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.awards-and-certificates.certificates.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function deleteImage(Request $request, CertificateAction $action)
    {
        if ($action->deleteImage($request)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'File not found'], 404);
    }
}
