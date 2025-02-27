<?php

namespace App\Http\Controllers\Admin\Role;

use App\Actions\RoleAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

class AdminRoleController extends AdminController
{

    protected $routePath = 'admin.roles';
    protected $pageActive = 'roles';
    protected $pageTitle = 'Role';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.roles.table", [
            'data' => (new RoleRepository())->datatable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = (new RoleRepository())->getDynamicPermissions();
        return view("admin.pages.roles.create", [
            'permissionsList' => $permissions,
            'pageTitle' => 'Create Role',
            'pageDescription' => 'Add a new role with Superadmin access or specific permissions.'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RoleAction $roleAction)
    {
        try {
            $roleAction->store($request);

            return redirect(route('admin.roles.index'))->with(['info' => __("admin.success_add")]);
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
        $permissions = (new RoleRepository())->getDynamicPermissions();
        $data = Role::findByUlid($id, true);
        return view("admin.pages.roles.edit", [
            'data' => $data,
            'permissionsList' => $permissions,
            'pageTitle' => 'Update Role',
            'pageDescription' => 'Update a existing role with Superadmin access or specific permissions.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleAction $roleAction, string $id)
    {
        try {
            $roleAction->update($request, $id);

            return redirect(route('admin.roles.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleAction $roleAction, string $id)
    {
        try {
            $roleAction->delete($id);

            return redirect(route('admin.roles.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
