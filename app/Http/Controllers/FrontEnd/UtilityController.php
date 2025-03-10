<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function switchLang($locale, Request $request)
    {
        if (!in_array($locale, ['en', 'id'])) {
            abort(400);
        }

        session(['locale' => $locale]);
        return back();
    }
}
