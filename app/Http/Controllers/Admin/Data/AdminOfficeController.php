<?php

namespace App\Http\Controllers\Admin\Data;

use App\Actions\Data\OfficeAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Data\OfficeRequest;
use App\Models\Data\Office;
use App\Repositories\Data\OfficeRepository;
use Illuminate\Http\Request;

class AdminOfficeController extends AdminController
{
    protected $routePath = 'admin.offices';
    protected $pageActive = 'offices';
    protected $subPageActive = '';
    protected $pageTitle = 'Offices';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.offices.table", [
            'data' => (new OfficeRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.offices.create", [
            'pageTitle' => 'Create Office'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficeRequest $request, OfficeAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.offices.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Office::findByUlid($id, true);
        return view("admin.pages.offices.edit", [
            'data' => $data,
            'pageTitle' => 'Update Office'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficeRequest $request, OfficeAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.offices.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficeAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.offices.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
