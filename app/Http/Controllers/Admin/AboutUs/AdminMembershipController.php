<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\AboutUs\MembershipAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUs\MembershipRequest;
use App\Models\AboutUs\Membership;
use App\Repositories\AboutUs\MembershipRepository;

;
use Illuminate\Http\Request;

class AdminMembershipController extends AdminController
{
    protected $routePath = 'admin.awards-and-certificates.awards';
    protected $pageActive = 'awards-and-certificates';
    protected $subPageActive = 'memberships';
    protected $pageTitle = 'Membership';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.about-us.memberships.table", [
            'data' => (new MembershipRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.about-us.memberships.create", [
            'pageTitle' => 'Create Membership'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipRequest $request, MembershipAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.awards-and-certificates.memberships.index'))->with(['info' => __("admin.success_add")]);
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
        $data = Membership::findByUlid($id, true);
        return view("admin.pages.about-us.memberships.edit", [
            'data' => $data,
            'pageTitle' => 'Update Membership'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipRequest $request, MembershipAction $action, string $id)
    {
        try {
            $action->update($request, $id);

            return redirect(route('admin.awards-and-certificates.memberships.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.awards-and-certificates.memberships.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
