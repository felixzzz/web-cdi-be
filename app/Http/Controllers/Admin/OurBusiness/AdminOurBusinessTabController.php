<?php

namespace App\Http\Controllers\Admin\OurBusiness;

use App\Actions\Data\OurBusinessTabAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\OurBusiness\OurBusinessTab;
use App\Repositories\Data\OurBusinessRepository;
use Illuminate\Http\Request;

class AdminOurBusinessTabController extends AdminController
{
    protected $routePath = 'admin.page-management.our-business-tabs';
    protected $pageActive = 'our-business-content';
    protected $subPageActive = 'our-business-list';
    protected $pageTitle = 'Our Business Tabs';

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return view("admin.pages.our-business-tabs.table", [
            'data' => (new OurBusinessRepository())->tabsDatatable($id),
            'businessId' => $id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view("admin.pages.our-business-tabs.create", [
            'pageTitle' => 'Create Our Business Tab',
            'businessId' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OurBusinessTabAction $action, $id)
    {
        try {
            $action->store($request, $id);

            return redirect(route('admin.page-management.our-business-tabs.index', $id))->with(['info' => __("admin.success_add")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $tabId)
    {
        $data = OurBusinessTab::findByUlid($tabId, true);
        return view("admin.pages.our-business-tabs.edit", [
            'data' => $data,
            'businessId' => $id,
            'pageTitle' => 'Update Our Business Tab'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurBusinessTabAction $action, string $id, $tabId)
    {
        try {
            $action->update($request, $id, $tabId);

            return redirect(route('admin.page-management.our-business-tabs.index', $id))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurBusinessTabAction $action, string $id, $tabId)
    {
        try {
            $action->delete($tabId);

            return redirect(route('admin.page-management.our-business-tabs.index', $id))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, OurBusinessTabAction $action)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
