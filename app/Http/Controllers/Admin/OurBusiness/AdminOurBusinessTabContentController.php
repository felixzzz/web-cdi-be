<?php

namespace App\Http\Controllers\Admin\OurBusiness;

use App\Actions\Data\OurBusinessTabContentAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Data\OurBusinessRepository;
use Illuminate\Http\Request;

class AdminOurBusinessTabContentController extends AdminController
{
    protected $routePath = 'admin.page-management.our-business-tabs.contents';
    protected $pageActive = 'our-business-content';
    protected $subPageActive = 'our-business-list';
    protected $pageTitle = 'Our Business Contents';

    /**
     * Display a listing of the resource.
     */
    public function index($id, $tabId)
    {
        return view("admin.pages.our-business-tab-contents.table", [
            'data' => (new OurBusinessRepository())->contentsDatatable($id, $tabId),
            'businessId' => $id,
            'tabId' => $tabId
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, $tabId)
    {
        return view("admin.pages.our-business-tab-contents.create", [
            'pageTitle' => 'Create Our Business Content',
            'businessId' => $id,
            'tabId' => $tabId
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, OurBusinessTabContentAction $action, $id, $tabId)
    {
        try {
            $action->store($request, $id, $tabId);

            return redirect(route('admin.page-management.our-business-tabs.contents.index', ['id' => $id, 'ourBusinessTab' => $tabId]))->with(['info' => __("admin.success_add")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $tabId, $contentId)
    {
        $data = OurBusinessTab::findByUlid($contentId, true);
        return view("admin.pages.our-business-tab-contents.edit", [
            'data' => $data,
            'businessId' => $id,
            'tabId' => $tabId,
            'pageTitle' => 'Update Our Business Content'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurBusinessTabContentAction $action, string $id, $tabId, $contentId)
    {
        try {
            $action->update($request, $id, $tabId, $contentId);

            return redirect(route('admin.page-management.our-business-tabs.contents.index', ['id' => $id, 'ourBusinessTab' => $tabId]))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurBusinessTabContentAction $action, string $id, $tabId, $contentId)
    {
        try {
            $action->delete($contentId);

            return redirect(route('admin.page-management.our-business-tabs.contents.index', ['id' => $id, 'ourBusinessTab' => $tabId]))->with(['info' => __("admin.success_delete")]);
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
