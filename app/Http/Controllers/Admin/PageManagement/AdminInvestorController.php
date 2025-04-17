<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Actions\PageManagement\InvestorContentAction;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;

class AdminInvestorController extends AdminController
{
    protected $routePath = 'admin.page-management.investor-content';
    protected $pageActive = 'investor-content';
    protected $subPageActive = '';
    protected $pageTitle = 'Investor Content';


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.page-management.investor-content.index", [
            'data' => (new PreferenceRepository())->getAllContentPage('investor')
        ]);
    }

    public function store(Request $request, InvestorContentAction $action)
    {
        // try {
            $action->store($request);

            return redirect(route('admin.page-management.investor-content.index'))->with(['info' => __("admin.success_update")]);
        // } catch (\Throwable $e) {
        //     return redirect()->back()->withInput($request->input())->with(['error' =>  $e->getMessage()]);
        // }
    }
}
