<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GovernanceController extends Controller
{
    public function index()
    {
        return Inertia::render("Governance/GovernancePage");
    }
}
