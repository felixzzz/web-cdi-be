<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\Utility\AdditionalFileAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utility\AdditionalFileRequest;
use App\Models\Utility\AdditionalFile;
use App\Repositories\Data\GovernanceFileRepository;
use Illuminate\Http\Request;

class AdminGovernanceFileController extends AdminController
{
    protected $routePath = 'admin.page-management.governance-files';
    protected $pageActive = 'governance-content';
    protected $subPageActive = 'governance-files';
    protected $pageTitle = 'Governance Files';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = request()->type;
        return view("admin.pages.governance-files.table", [
            'data' => (new GovernanceFileRepository())->datatable(10, $type),
            'pageTitle' => 'Create Governance File',
            'type' => $type,
            'xsubPageActive' => $type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = request()->type;
        return view("admin.pages.governance-files.create", [
            'pageTitle' => 'Create Governance File',
            'type' => $type,
            'xsubPageActive' => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdditionalFileRequest $request, AdditionalFileAction $action)
    {
        $type = request()->type;
        try {
            $action->store($request, str_replace("-", "_", $type));

            return redirect(route('admin.page-management.governance-files.index', ['type' => $type]))->with(['info' => __("admin.success_add")]);
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
        $type = request()->type;
        $data = AdditionalFile::findByUlid($id, true);
        return view("admin.pages.governance-files.edit", [
            'data' => $data,
            'pageTitle' => 'Update Governance File',
            'type' => $type,
            'xsubPageActive' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdditionalFileRequest $request, AdditionalFileAction $action, string $id)
    {
        $type = request()->type;
        try {
            $action->update($request, $id, str_replace("-", "_", $type));

            return redirect(route('admin.page-management.governance-files.index', ['type' => $type]))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalFileAction $action, string $id)
    {
        $type = request()->type;
        try {
            $action->delete($id);

            return redirect(route('admin.page-management.governance-files.index', ['type' => $type]))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, AdditionalFileAction $action)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
