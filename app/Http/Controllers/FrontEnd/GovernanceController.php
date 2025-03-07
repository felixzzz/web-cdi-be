<?php

namespace App\Http\Controllers\FrontEnd;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GovernanceController extends Controller
{
    public function index()
    {
        return Inertia::render("Governance/GovernancePage");
    }

    public function whistleblowing()
    {
        return Inertia::render("GovernanceWhistleblowing/Index");
    }

    public function type($type)
    {
        return Inertia::render("Governance/GovernanceTypePage", [
            'type' => $type,
            'title' => Helper::getTitleTypeGovernance($type)
        ]);
    }
}
