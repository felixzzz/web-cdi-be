<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Actions\Utility\CountryAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Utility\Country;
use App\Repositories\Utility\CountryRepository;

;
use Illuminate\Http\Request;

class AdminCountryController extends AdminController
{
    protected $routePath = 'admin.countries';
    protected $pageActive = 'master';
    protected $subPageActive = 'countries';
    protected $pageTitle = 'Country';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.countries.table", [
            'data' => (new CountryRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.countries.create", [
            'pageTitle' => 'Create Country'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CountryAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.countries.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Country::findByUlid($id, true);
        return view("admin.pages.countries.edit", [
            'data' => $data,
            'pageTitle' => 'Update Country'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountryAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.countries.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountryAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.countries.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
