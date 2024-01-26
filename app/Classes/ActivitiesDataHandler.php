<?php

namespace App\Classes;

class ActivitiesDataHandler extends BaseDataHandler
{
    private static $url = 'https://www.boredapi.com/api/activity';
    
    public function processData($responses){
        $userData = [];

        foreach ($responses as $response) {
            $responseData = $response->json();
            $userData[] = $responseData;
        }

        return $userData;
    }

    public function extractAndConvertToXml($data){
        // Implementation for extracting and converting data to XML
    }

    public function sortUserData($userData)
    {
        usort($userData, function ($a, $b) {
            return strcmp($b['type'], $a['type']);
        });

        return $userData;
    }

    public static function getUrl() {
        return self::$url;
    }
}