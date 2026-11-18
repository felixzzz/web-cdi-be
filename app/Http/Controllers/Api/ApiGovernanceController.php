<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Utility\FileRepository;
use Illuminate\Http\Request;

class ApiGovernanceController extends Controller
{
    public function files(FileRepository $fileRepository, $type)
    {
        if ($type === 'guideline' || $type === 'governance-guideline') {
            $type = 'governance_guideline';
        }
        return $fileRepository->findPaginated($type);
    }
}
