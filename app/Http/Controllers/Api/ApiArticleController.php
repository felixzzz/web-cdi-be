<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Article\ArticleRepository;
use Illuminate\Http\Request;

class ApiArticleController extends Controller
{
    public function latest(ArticleRepository $articleRepository)
    {
        return $articleRepository->latestArticle(request('category_id'), request('type', 'news'), request("limit", 8));
    }

    public function latestMedia(ArticleRepository $articleRepository)
    {
        return $articleRepository->latestMedia();
    }

    public function relates(ArticleRepository $articleRepository, $ulid)
    {
        return $articleRepository->relates($ulid);
    }

    public function list(Request $request, ArticleRepository $articleRepository, $type)
    {
        return $articleRepository->findPaginated($request, $type);
    }
}
