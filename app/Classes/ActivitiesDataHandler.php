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
        $xmlData = new \SimpleXMLElement('<root></root>');

        foreach ($data as $item) {
            $xmlItem = $xmlData->addChild('item');

            foreach ($item as $key => $value) {
                $xmlItem->addChild($key, is_array($value) ? json_encode($value) : $value);
            }
        }

        return $xmlData->asXML();
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