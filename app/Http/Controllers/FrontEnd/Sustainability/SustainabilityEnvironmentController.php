<?php

namespace App\Http\Controllers\FrontEnd\Sustainability;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SustainabilityEnvironmentController extends Controller
{
    public function index()
    {
        return Inertia::render("Sustainability/Environment/EnvironmentPage");
    }
}
