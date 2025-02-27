<?php

namespace App\Http\Controllers\Admin\User;

use App\Actions\UserAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminUserController extends AdminController
{
    protected $routePath = 'admin.users';
    protected $pageActive = 'users';
    protected $pageTitle = 'User Admin';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.users.table", [
            'data' => (new UserRepository())->datatable(),
            'roles' => (new RoleRepository())->list()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request, UserAction $userAction)
    {
        try {
            $userAction->store($request);

            return redirect(route('admin.users.index'))->with(['info' => __("admin.success_add")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['info' =>  $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, UserAction $userAction, string $id)
    {
        try {
            $userAction->update($request, $id);

            return redirect(route('admin.users.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['info' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAction $userAction, string $id)
    {
        try {
            $userAction->delete($id);

            return redirect(route('admin.users.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
