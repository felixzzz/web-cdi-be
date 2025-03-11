<?php

namespace App\Http\Controllers\Admin\Investor;

use App\Actions\Investor\InvestorReportAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Investor\InvestorReportRequest;
use App\Repositories\Investor\InvestorReportRepository;
use Illuminate\Http\Request;

class AdminInvestorReportController extends AdminController
{
    protected $routePath = 'admin.investor.reports';
    protected $pageActive = 'investor';
    protected $subPageActive = 'investor-reports';
    protected $pageTitle = 'Investor Reports';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.investor-reports.table", [
            'data' => (new InvestorReportRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.investor-reports.create", [
            'pageTitle' => 'Create Investor Reports'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvestorReportRequest $request, InvestorReportAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.investor.reports.index'))->with(['info' => __("admin.success_add")]);
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
        $data = PressRelease::findByUlid($id, true);
        return view("admin.pages.investor-reports.edit", [
            'data' => $data,
            'pageTitle' => 'Update Investor Reports'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvestorReportRequest $request, InvestorReportAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.investor.reports.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvestorReportAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.investor.reports.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
