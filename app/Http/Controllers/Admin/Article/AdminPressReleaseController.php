<?php

namespace App\Http\Controllers\Admin\Article;

use App\Actions\Article\PressReleaseAction;
use App\Http\Controllers\AdminController;
use App\Http\Requests\Article\PressReleaseRequest;
use App\Models\Article\PressRelease;
use App\Repositories\Article\PressReleaseRepository;
use Illuminate\Http\Request;

class AdminPressReleaseController extends AdminController
{
    protected $routePath = 'admin.article.press-releases';
    protected $pageActive = 'article';
    protected $subPageActive = 'press-release';
    protected $pageTitle = 'Press Release';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.press-releases.table", [
            'data' => (new PressReleaseRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.press-releases.create", [
            'pageTitle' => 'Create Press Release'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PressReleaseRequest $request, PressReleaseAction $articleCategory)
    {
        try {
            $articleCategory->store($request);

            return redirect(route('admin.article.press-releases.index'))->with(['info' => __("admin.success_add")]);
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
        $data = PressRelease::findByUlid($id, true);
        return view("admin.pages.press-releases.edit", [
            'data' => $data,
            'pageTitle' => 'Update Press Release'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PressReleaseRequest $request, PressReleaseAction $articleCategory, string $id)
    {
        try {
            $articleCategory->update($request, $id);

            return redirect(route('admin.article.press-releases.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressReleaseAction $articleCategory, string $id)
    {
        try {
            $articleCategory->delete($id);

            return redirect(route('admin.article.press-releases.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
