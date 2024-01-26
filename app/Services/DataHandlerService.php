<?php

namespace App\Services;

use App\Classes\ActivitiesDataHandler;
use App\Classes\UsersDataHandler;
use App\Interfaces\DataHandlerInterface;
use Illuminate\Support\Facades\Http;

class DataHandlerService
{
    private $primaryApiUrl = 'https://randomuser2.me/api/';
    private $backupApiUrl = 'https://www.boredapi.com/api/activity';

    public function bindDataHandler()
    {
        app()->bind(DataHandlerInterface::class, function ($app) {
            $firstApiAvailable = $this->isApiAccessible($this->primaryApiUrl);
            $secondApiAvailable = $this->isApiAccessible($this->backupApiUrl);

            if ($firstApiAvailable) {
                return $app->make(UsersDataHandler::class);
            } elseif ($secondApiAvailable) {
                return $app->make(ActivitiesDataHandler::class);
            }
        });
    }

    private function isApiAccessible($apiUrl)
    {
        try {
            $response = Http::get($apiUrl);            
            $responseData = $response->json();

            return !empty($responseData);
        } catch (\Exception $exception) {
            return false;
        }
    }
}