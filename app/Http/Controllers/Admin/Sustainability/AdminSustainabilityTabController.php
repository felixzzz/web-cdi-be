<?php

namespace App\Http\Controllers\Admin\Sustainability;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Actions\Sustainability\SustainabilityTabAction;
use App\Models\Sustainability\SustainabilityTab;
use App\Repositories\Sustainability\SustainabilityTabRepository;

class AdminSustainabilityTabController extends AdminController
{
    protected $routePath = 'admin.sustainability-tabs';
    protected $pageActive = 'sustainability-content';
    protected $subPageActive = 'sustainability-tabs';
    protected $pageTitle = 'Sustainability Tab';

    /**
     * Display a listing of the resource.
     */
    public function index($category)
    {
        return view("admin.pages.sustainability-tabs.table", [
            'data' => (new SustainabilityTabRepository())->datatable($category),
            'category' => $category,
            'pageTitle' => 'Sustainability Tab ' . Str::ucfirst($category),
            'xsubPageActive' => "sustainability-tabs-$category"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category)
    {
        return view("admin.pages.sustainability-tabs.create", [
            'pageTitle' => 'Create Sustainability Tab ' . Str::ucfirst($category),
            'category' => $category,
            'xsubPageActive' => "sustainability-tabs-$category"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SustainabilityTabAction $action, $category)
    {
        try {
            $action->store($request, $category);

            return redirect(route('admin.sustainability-tabs.index', ['category' => $category]))->with(['info' => __("admin.success_add")]);
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
    public function edit(string $category, $id)
    {
        $data = SustainabilityTab::findByUlid($id, true);
        $category = request("category", "environment");
        return view("admin.pages.sustainability-tabs.edit", [
            'data' => $data,
            'category' => $category,
            'xsubPageActive' => "sustainability-tabs-$category",
            'pageTitle' => 'Update Sustainability Tab ' . Str::ucfirst($category),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SustainabilityTabAction $action, string $category, $id)
    {
        try {
            $action->update($request, $id, $category);

            return redirect(route('admin.sustainability-tabs.index', ['category' => $category]))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SustainabilityTabAction $action, string $category, $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.sustainability-tabs.index', ['category' => $category]))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, SustainabilityTabAction $action, $category)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
