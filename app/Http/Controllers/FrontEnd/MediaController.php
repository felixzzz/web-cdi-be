<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MediaController extends Controller
{
    public function index($type)
    {
        return Inertia::render("Media/MediaPage", [
            'type' => $type
        ]);
    }

    public function detail($type, $id)
    {
        return Inertia::render("MediaDetail/MediaDetailPage", [
            'type' => $type
        ]);
    }
}
