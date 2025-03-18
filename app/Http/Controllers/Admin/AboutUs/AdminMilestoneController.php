<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\AboutUs\MilestoneAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\MilestoneRequest;
use App\Models\AboutUs\Milestone;
use App\Repositories\AboutUs\MilestoneRepository;

;
use Illuminate\Http\Request;

class AdminMilestoneController extends AdminController
{
    protected $routePath = 'admin.milestones';
    protected $pageActive = 'about-us-content';
    protected $subPageActive = 'milestones';
    protected $pageTitle = 'Milestone';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.milestones.table", [
            'data' => (new MilestoneRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.milestones.create", [
            'pageTitle' => 'Create Milestone'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MilestoneRequest $request, MilestoneAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.milestones.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Milestone::findByUlid($id, true);
        return view("admin.pages.about-us.milestones.edit", [
            'data' => $data,
            'pageTitle' => 'Update Milestone'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MilestoneRequest $request, MilestoneAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.milestones.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MilestoneAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.milestones.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
