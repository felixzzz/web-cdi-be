<?php

namespace App\Http\Controllers\Admin\OurBusiness;

use App\Actions\Data\OurBusinessAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\OurBusiness\OurBusiness;
use App\Repositories\Data\OurBusinessRepository;
use Illuminate\Http\Request;

class AdminOurBusinessListController extends AdminController
{
    protected $routePath = 'admin.page-management.our-business-list';
    protected $pageActive = 'our-business-content';
    protected $subPageActive = 'our-business-list';
    protected $pageTitle = 'Our Business List';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.our-business.table", [
            'data' => (new OurBusinessRepository())->datatable()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = OurBusiness::findByUlid($id, true);
        return view("admin.pages.our-business.edit", [
            'data' => $data,
            'pageTitle' => 'Update Our Business'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurBusinessAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.page-management.our-business-list.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
