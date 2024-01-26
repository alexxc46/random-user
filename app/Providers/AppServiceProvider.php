<?php

namespace App\Providers;

use App\Classes\ActivitiesDataHandler;
use App\Classes\BaseDataHandler;
use App\Classes\UsersDataHandler;
use App\Http\Controllers\DataController;
use App\Interfaces\DataHandlerInterface;
use App\Services\DataHandlerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $dataHandlerService = new DataHandlerService();
        $dataHandlerService->bindDataHandler();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
