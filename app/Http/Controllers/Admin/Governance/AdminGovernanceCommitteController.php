<?php

namespace App\Http\Controllers\Admin\Governance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Governance\GovernanceCommitteAction;
use App\Http\Controllers\AdminController;
use App\Models\Governance\GovernanceCommitte;
use App\Repositories\Governance\GovernanceCommitteRepository;

class AdminGovernanceCommitteController extends AdminController
{
    protected $routePath = 'admin.governance-committes';
    protected $pageActive = 'governance-content';
    protected $subPageActive = 'governance-committes';
    protected $pageTitle = 'Governance Committe';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.governance-committes.table", [
            'data' => (new GovernanceCommitteRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.governance-committes.create", [
            'pageTitle' => 'Create Governance Committe'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, GovernanceCommitteAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.governance-committes.index'))->with(['info' => __("admin.success_add")]);
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
        $data = GovernanceCommitte::findByUlid($id, true);
        return view("admin.pages.governance-committes.edit", [
            'data' => $data,
            'pageTitle' => 'Update Governance Committe'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GovernanceCommitteAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.governance-committes.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GovernanceCommitteAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.governance-committes.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, GovernanceCommitteAction $action)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
