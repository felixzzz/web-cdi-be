<?php

namespace App\Http\Controllers\Admin\Sustainability;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Actions\Sustainability\SustainabilityContentAction;
use App\Models\Sustainability\SustainabilityContent;
use App\Repositories\Sustainability\SustainabilityContentRepository;

class AdminSustainabilityContentController extends AdminController
{
    protected $routePath = 'admin.sustainability-contents';
    protected $pageActive = 'sustainability-content';
    protected $subPageActive = 'sustainability-contents';
    protected $pageTitle = 'Sustainability Content';

    /**
     * Display a listing of the resource.
     */
    public function index($category)
    {
        return view("admin.pages.sustainability-contents.table", [
            'data' => (new SustainabilityContentRepository())->datatable($category),
            'category' => $category,
            'pageTitle' => 'Sustainability Content ' . Str::ucfirst($category),
            'xsubPageActive' => "sustainability-contents-$category"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category)
    {
        return view("admin.pages.sustainability-contents.create", [
            'pageTitle' => 'Create Sustainability Content ' . Str::ucfirst($category),
            'category' => $category,
            'xsubPageActive' => "sustainability-contents-$category"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SustainabilityContentAction $action, $category)
    {
        try {
            $action->store($request, $category);

            return redirect(route('admin.sustainability-contents.index', ['category' => $category]))->with(['info' => __("admin.success_add")]);
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
        $data = SustainabilityContent::findByUlid($id, true);
        return view("admin.pages.sustainability-contents.edit", [
            'data' => $data,
            'category' => $category,
            'xsubPageActive' => "sustainability-contents-$category",
            'pageTitle' => 'Update Sustainability Content ' . Str::ucfirst($category),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SustainabilityContentAction $action, string $category, $id)
    {
        try {
            $action->update($request, $id, $category);

            return redirect(route('admin.sustainability-contents.index', ['category' => $category]))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SustainabilityContentAction $action, string $category, $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.sustainability-contents.index', ['category' => $category]))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, SustainabilityContentAction $action, $category)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }

    public function element(Request $request, $category, $type)
    {
        $rand = Str::random();
        if ($type == 'content') {
            $view = view("admin.pages.sustainability-contents.components.content", ['rand' => $rand])->render();
            return response()->json(['view' => $view, 'rand' => $rand]);
        }

        if ($type == 'list') {
            $view = view("admin.pages.sustainability-contents.components.list", ['rand' => $rand])->render();
            return response()->json(['view' => $view, 'rand' => $rand]);
        }

        if ($type == 'simple') {
            $view = view("admin.pages.sustainability-contents.components.simple-list", ['rand' => $rand])->render();
            return response()->json(['view' => $view, 'rand' => $rand]);
        }

        if ($type == 'swiper') {
            $view = view("admin.pages.sustainability-contents.components.item-swiper", ['rand' => $rand])->render();
            return response()->json(['view' => $view, 'rand' => $rand]);
        }

        return response()->json(['error' => 'Invalid type'], 400);
    }
}
