<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Actions\Utility\QuickLinkAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuickLinkRequest;
use App\Models\Utility\QuickLink;
use App\Repositories\Utility\QuickLinkRepository;
use Illuminate\Http\Request;

class AdminQuickLinkController extends AdminController
{
    protected $routePath = 'admin.quick-links';
    protected $pageActive = 'master';
    protected $subPageActive = 'quick-links';
    protected $pageTitle = 'Quick Link';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.quick-links.table", [
            'data' => (new QuickLinkRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.quick-links.create", [
            'pageTitle' => 'Create Quick Link'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuickLinkRequest $request, QuickLinkAction $quickLink)
    {
        try {
            $quickLink->store($request);

            return redirect(route('admin.quick-links.index'))->with(['info' => __("admin.success_add")]);
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
        $data = QuickLink::findByUlid($id, true);
        return view("admin.pages.quick-links.edit", [
            'data' => $data,
            'pageTitle' => 'Update Quick Link'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuickLinkRequest $request, QuickLinkAction $quickLink, string $id)
    {
        try {
            $quickLink->update($request, $id);

            return redirect(route('admin.quick-links.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuickLinkAction $quickLink, string $id)
    {
        try {
            $quickLink->delete($id);

            return redirect(route('admin.quick-links.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, QuickLinkAction $action)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
