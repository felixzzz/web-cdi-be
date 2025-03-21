<?php

namespace App\Http\Controllers\Admin\Sustainability;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Actions\Sustainability\SustainabilityTabItemAction;
use App\Models\Sustainability\SustainabilityTab;
use App\Models\Sustainability\SustainabilityTabItem;
use App\Repositories\Sustainability\SustainabilityTabItemRepository;

class AdminSustainabilityTabItemController extends AdminController
{
    protected $routePath = 'admin.sustainability-tabs';
    protected $pageActive = 'sustainability-content';
    protected $subPageActive = 'sustainability-tabs';
    protected $pageTitle = 'Sustainability Tab Item';

    /**
     * Display a listing of the resource.
     */
    public function index($category, $tabId)
    {
        return view("admin.pages.sustainability-tab-items.table", [
            'data' => (new SustainabilityTabItemRepository())->datatable($category, $tabId),
            'category' => $category,
            'tabId' => $tabId,
            'pageTitle' => 'Sustainability Tab ' . Str::ucfirst($category) . ' Item',
            'xsubPageActive' => "sustainability-tabs-$category"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category, $tabId)
    {
        return view("admin.pages.sustainability-tab-items.create", [
            'pageTitle' => 'Create Sustainability Tab ' . Str::ucfirst($category) . ' Item',
            'category' => $category,
            'tabId' => $tabId,
            'xsubPageActive' => "sustainability-tabs-$category"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SustainabilityTabItemAction $action, $category, $tabId)
    {
        // try {
            $action->store($request, $tabId);

            return redirect(route('admin.sustainability-tabs.items.index', ['category' => $category, 'tabId' => $tabId]))->with(['info' => __("admin.success_add")]);
        // } catch (\Throwable $e) {
        //     return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $category, $tabId, $itemId)
    {
        $data = SustainabilityTabItem::findByUlid($itemId, true);
        return view("admin.pages.sustainability-tab-items.edit", [ 'data' => $data,
            'category' => $category,
            'tabId' => $tabId,
            'pageTitle' => 'Update Sustainability Tab ' . Str::ucfirst($category) . ' Item',
            'xsubPageActive' => "sustainability-tabs-$category"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SustainabilityTabItemAction $action, string $category, $tabId, $itemId)
    {
        try {
            $action->update($request, $itemId, $tabId);

            return redirect(route('admin.sustainability-tabs.items.index', ['category' => $category, 'tabId' => $tabId]))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SustainabilityTabItemAction $action, string $category, $tabId, $itemId)
    {
        try {
            $action->delete($itemId);

            return redirect(route('admin.sustainability-tabs.items.index', ['category' => $category, 'tabId' => $tabId]))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, SustainabilityTabItemAction $action)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
