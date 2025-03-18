<?php

namespace App\Http\Controllers\Admin\Data;

use App\Actions\Data\InstitutionAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Data\InstitutionRequest;
use App\Models\Data\Institution;
use App\Repositories\Data\InstitutionRepository;
use Illuminate\Http\Request;

class AdminInstitutionController extends AdminController
{
    protected $routePath = 'admin.institutions';
    protected $pageActive = 'institutions';
    protected $subPageActive = '';
    protected $pageTitle = 'Institutions';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.institutions.table", [
            'data' => (new InstitutionRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.institutions.create", [
            'pageTitle' => 'Create Institution'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstitutionRequest $request, InstitutionAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.institutions.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Institution::findByUlid($id, true);
        return view("admin.pages.institutions.edit", [
            'data' => $data,
            'pageTitle' => 'Update Institution'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstitutionRequest $request, InstitutionAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.institutions.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstitutionAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.institutions.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
