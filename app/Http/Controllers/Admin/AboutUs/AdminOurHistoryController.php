<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\AboutUs\OurHistoryAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\OurHistoryRequest;
use App\Models\AboutUs\OurHistory;
use App\Repositories\AboutUs\OurHistoryRepository;

;
use Illuminate\Http\Request;

class AdminOurHistoryController extends AdminController
{
    protected $routePath = 'admin.our-histories';
    protected $pageActive = 'about-us-content';
    protected $subPageActive = 'our-histories';
    protected $pageTitle = 'Our History';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.our-histories.table", [
            'data' => (new OurHistoryRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.our-histories.create", [
            'pageTitle' => 'Create Our History'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OurHistoryRequest $request, OurHistoryAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.our-histories.index'))->with(['info' => __("admin.success_add")]);
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
        $data = OurHistory::findByUlid($id, true);
        return view("admin.pages.about-us.our-histories.edit", [
            'data' => $data,
            'pageTitle' => 'Update Our History'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurHistoryRequest $request, OurHistoryAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.our-histories.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurHistoryAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.our-histories.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
