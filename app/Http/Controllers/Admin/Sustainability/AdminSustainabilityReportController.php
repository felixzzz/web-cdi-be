<?php

namespace App\Http\Controllers\Admin\Sustainability;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Actions\Sustainability\SustainabilityReportAction;
use App\Models\Sustainability\SustainabilityReport;
use App\Repositories\Sustainability\SustainabilityReportRepository;

class AdminSustainabilityReportController extends AdminController
{
    protected $routePath = 'admin.sustainability-reports';
    protected $pageActive = 'sustainability-reports';
    protected $subPageActive = 'sustainability-reports';
    protected $pageTitle = 'Sustainability Report';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.sustainability-reports.table", [
            'data' => (new SustainabilityReportRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.sustainability-reports.create", [
            'pageTitle' => 'Create Sustainability Report'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SustainabilityReportAction $quickLink)
    {
        try {
            $quickLink->store($request);

            return redirect(route('admin.sustainability-reports.index'))->with(['info' => __("admin.success_add")]);
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
        $data = SustainabilityReport::findByUlid($id, true);
        return view("admin.pages.sustainability-reports.edit", [
            'data' => $data,
            'pageTitle' => 'Update Sustainability Report'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SustainabilityReportAction $quickLink, string $id)
    {
        try {
            $quickLink->update($request, $id);

            return redirect(route('admin.sustainability-reports.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SustainabilityReportAction $quickLink, string $id)
    {
        try {
            $quickLink->delete($id);

            return redirect(route('admin.sustainability-reports.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
