<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\AboutUs\AwardAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\AwardRequest;
use App\Models\AboutUs\Award;
use App\Repositories\AboutUs\AwardRepository;

;
use Illuminate\Http\Request;

class AdminAwardController extends AdminController
{
    protected $routePath = 'admin.awards-and-certificates.awards';
    protected $pageActive = 'awards-and-certificates';
    protected $subPageActive = 'awards';
    protected $pageTitle = 'Award';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.awards.table", [
            'data' => (new AwardRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.awards.create", [
            'pageTitle' => 'Create Award'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AwardRequest $request, AwardAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.awards-and-certificates.awards.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Award::findByUlid($id, true);
        return view("admin.pages.about-us.awards.edit", [
            'data' => $data,
            'pageTitle' => 'Update Award'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AwardRequest $request, AwardAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.awards-and-certificates.awards.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AwardAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.awards-and-certificates.awards.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
