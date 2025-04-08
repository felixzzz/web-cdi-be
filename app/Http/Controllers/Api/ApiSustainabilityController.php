<?php

namespace App\Http\Controllers\Api;

use App\Enums\RatingRecognitionType;
use App\Http\Controllers\Controller;
use App\Repositories\Sustainability\ResponsibleRepository;
use App\Repositories\Utility\RatingRecognitionRepository;
use Illuminate\Http\Request;

class ApiSustainabilityController extends Controller
{
    public function ratings(RatingRecognitionRepository $ratingRecognitionRepository)
    {
        return $ratingRecognitionRepository->getByCategory(RatingRecognitionType::Rating);
    }

    public function recognitions(RatingRecognitionRepository $ratingRecognitionRepository)
    {
        return $ratingRecognitionRepository->getByCategory(RatingRecognitionType::Recognition);
    }

    public function responsibles(ResponsibleRepository $responsibleRepository)
    {
        return $responsibleRepository->list();
    }
}
