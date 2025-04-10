<?php

namespace App\Http\Controllers\FrontEnd\AboutUs;

use App\Http\Controllers\Controller;
use App\Repositories\Data\TeamRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManagementController extends Controller
{
    public function index()
    {
        return Inertia::render("AboutUs/Management/ManagementPage");
    }

    public function team($id)
    {
        return Inertia::render("Team/TeamPage", [
            'data' => (new TeamRepository())->find($id)
        ]);
    }
}
