<?php

namespace App\Http\Controllers\Admin\Sustainability;

use App\Actions\Utility\RatingRecognitionAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRecognitionRequest;
use App\Models\Sustainability\RatingRecognition;
use App\Repositories\Utility\RatingRecognitionRepository;
use Illuminate\Http\Request;

class AdminRatingRecognitionController extends AdminController
{
    protected $routePath = 'admin.rating-recognitions';
    protected $pageActive = 'sustainability-content';
    protected $subPageActive = 'rating-recognitions';
    protected $pageTitle = 'Rating Recognition';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.rating-recognitions.table", [
            'data' => (new RatingRecognitionRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.rating-recognitions.create", [
            'pageTitle' => 'Create Rating Recognition'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingRecognitionRequest $request, RatingRecognitionAction $quickLink)
    {
        try {
            $quickLink->store($request);

            return redirect(route('admin.rating-recognitions.index'))->with(['info' => __("admin.success_add")]);
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
        $data = RatingRecognition::findByUlid($id, true);
        return view("admin.pages.rating-recognitions.edit", [
            'data' => $data,
            'pageTitle' => 'Update Rating Recognition'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RatingRecognitionRequest $request, RatingRecognitionAction $quickLink, string $id)
    {
        try {
            $quickLink->update($request, $id);

            return redirect(route('admin.rating-recognitions.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RatingRecognitionAction $quickLink, string $id)
    {
        try {
            $quickLink->delete($id);

            return redirect(route('admin.rating-recognitions.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }

    public function updateSort(Request $request, RatingRecognitionAction $action)
    {
        $action->updateSort($request);

        return response()->json(['success' => true, 'message' => 'Sorting updated successfully']);
    }
}
