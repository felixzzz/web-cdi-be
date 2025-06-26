<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Repositories\Article\ArticleRepository;
use App\Repositories\Utility\PreferenceRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MediaController extends Controller
{
    public function index($type)
    {
        return Inertia::render("Media/MediaPage", [
            'type' => $type,
            'status' => (new PreferenceRepository())->findMediaStatus()
        ]);
    }

    public function detail($type, $id)
    {
        $data = (new ArticleRepository())->findBySlug($id);
        $this->withMetaTags([
            'title' => config('app.name') . " | " . $data->title,
            'description' => @$data->meta_tag['description'] ?:  $data->short_content,
            'keywords' => @$data->meta_tag['keyword'],
            'image' => $data->image
        ]);

        return Inertia::render("MediaDetail/MediaDetailPage", [
            'type' => $type,
            'data' => $data
        ]);
    }
}
