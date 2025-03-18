<?php

namespace App\Http\Controllers\Admin\Data;

use App\Actions\Data\TeamAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Data\TeamRequest;
use App\Models\Data\Team;
use App\Repositories\Data\TeamRepository;
use Illuminate\Http\Request;

class AdminTeamController extends AdminController
{
    protected $routePath = 'admin.teams';
    protected $pageActive = 'teams';
    protected $subPageActive = '';
    protected $pageTitle = 'Teams';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.teams.table", [
            'data' => (new TeamRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.teams.create", [
            'pageTitle' => 'Create Team'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request, TeamAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.teams.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Team::findByUlid($id, true);
        return view("admin.pages.teams.edit", [
            'data' => $data,
            'pageTitle' => 'Update Team'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, TeamAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.teams.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.teams.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
