<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    protected $routePath;
    protected $pageActive;
    protected $subPageActive;
    protected $pageTitle;
    protected $pageDescription;

    public function __construct()
    {
        // Don't return here - constructor can't return a value
        // Instead, share the menu with all views
        View::share([
            'menus' => Helper::menuAdmin(),
            'pageActive' => $this->pageActive,
            'subPageActive' => $this->subPageActive,
            'pageTitle' => $this->pageTitle,
            'pageDescription' => $this->pageDescription
        ]);
    }

    /**
     * The route base name for the controller module.
     *
     * @var string
     */

    /**
     * The main index function to showing datatable
     */
    public function checkAccess($module)
    {
        if (!itcan($this->accessmodule($module))) return Redirect::route('admin.dashboard')->with(['info' => "You don't have access to this resource"]);

        return true;
    }

    protected function accessmodule($str = "")
    {
        return $str . " " . $this->routePath;
    }
}
