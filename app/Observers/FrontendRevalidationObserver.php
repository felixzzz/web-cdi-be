<?php

namespace App\Observers;

use App\Repositories\Data\OurBusinessRepository;
use App\Services\FrontendRevalidationService;
use Illuminate\Database\Eloquent\Model;

class FrontendRevalidationObserver
{
    /**
     * Handle the Model "saved" event (covers created and updated).
     */
    public function saved(Model $model): void
    {
        $this->handleRevalidation($model);
    }

    /**
     * Handle the Model "deleted" event.
     */
    public function deleted(Model $model): void
    {
        $this->handleRevalidation($model);
    }

    /**
     * Handle the Model "restored" event.
     */
    public function restored(Model $model): void
    {
        $this->handleRevalidation($model);
    }

    /**
     * Trigger cache clearing and frontend revalidation.
     */
    protected function handleRevalidation(Model $model): void
    {
        // If it's an OurBusiness-related model, also reset its repository cache keys
        if (str_contains(get_class($model), 'OurBusiness')) {
            try {
                (new OurBusinessRepository())->resetCache();
            } catch (\Throwable $e) {
                // Ignore repository cache reset failure
            }
        }

        FrontendRevalidationService::trigger(path: '/', tag: 'cms-data', type: 'layout');
    }
}
