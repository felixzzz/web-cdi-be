<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\HomeContentAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminHomeContentController extends AdminController
{
    protected $routePath = 'admin.page-management.home-content';
    protected $pageActive = 'home-content';
    protected $subPageActive = '';
    protected $pageTitle = 'Home Content';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.home-content.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('home')
        ]);
    }

    public function store(Request $request, HomeContentAction $action)
    {
        try {
            $action->store($request);

            return redirect(route('admin.page-management.home-content.index'))->with(['info' => __("admin.success_update")]);
        } catch (\Throwable $e) {
            return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        }
    }
}
