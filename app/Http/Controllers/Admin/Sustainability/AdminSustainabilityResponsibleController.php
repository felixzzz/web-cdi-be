<?php

namespace App\Http\Controllers\Admin\Sustainability;

use App\Actions\Sustainability\ResponsibleAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Sustainability\Responsible;
use App\Repositories\Sustainability\ResponsibleRepository;
use Illuminate\Http\Request;

class AdminSustainabilityResponsibleController extends AdminController
{
    protected $routePath = 'admin.responsibles';
    protected $pageActive = 'sutainability';
    protected $subPageActive = 'responsibles';
    protected $pageTitle = 'Responsible';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.responsibles.table", [
            'data' => (new ResponsibleRepository())->datatable()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Responsible::findByUlid($id, true);
        return view("admin.pages.responsibles.edit", [
            'data' => $data,
            'pageTitle' => 'Update Responsible'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResponsibleAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.responsibles.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
