<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct()
    {
        View::share([
            'meta' => [
                'title' =>  config('app.name'),
                'description' => config('services.meta.description'),
                'keywords' => config('services.meta.keyword'),
            ],
            'preloads' => []
        ]);
    }

    public function withMetaTags($metaTags)
    {
        $meta = View::shared('meta');
        if(array_key_exists('keywords',$metaTags) && !@$metaTags['keywords']){
            $metaTags['keywords'] = $meta['keywords'];
        }
        if(array_key_exists('description',$metaTags) && !@$metaTags['description']){
            $metaTags['description'] = $meta['description'];
        }
        View::share('meta', [
            ...$meta,
            ...$metaTags
        ]);
    }
}
