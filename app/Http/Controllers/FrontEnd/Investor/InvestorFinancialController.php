<?php

namespace App\Http\Controllers\FrontEnd\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvestorFinancialController extends Controller
{
    public function index()
    {
        return Inertia::render("InvestorFinancial/InvestorFinancialPage");
    }
}
