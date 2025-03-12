<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Actions\Utility\TopicAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Utility\Topic;
use App\Repositories\Utility\TopicRepository;

;
use Illuminate\Http\Request;

class AdminTopicController extends AdminController
{
    protected $routePath = 'admin.topics';
    protected $pageActive = 'master';
    protected $subPageActive = 'topics';
    protected $pageTitle = 'Topic';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.topics.table", [
            'data' => (new TopicRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.topics.create", [
            'pageTitle' => 'Create Topic'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TopicAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.topics.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Topic::findByUlid($id, true);
        return view("admin.pages.topics.edit", [
            'data' => $data,
            'pageTitle' => 'Update Topic'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TopicAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.topics.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TopicAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.topics.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
