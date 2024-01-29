<?php

namespace App\Classes;

use App\Http\Requests\DataRequest;
use Illuminate\Support\Facades\Validator;

class UsersDataHandler extends BaseDataHandler
{
    private static $url = 'https://randomuser.me/api/';

    public function processData($responses){
        $userData = [];

        foreach ($responses as $response) {
            $responseData = $response->json();
            $userData = array_merge($userData, $responseData['results']);
        }

        $validator = Validator::make($userData[0], (new DataRequest())->rules());

        if ($validator->fails()) {
            return 'wrong name';
        }

        return $userData;
    }

    public function extractAndConvertToXml($userData){
        $xmlData = new \SimpleXMLElement('<users></users>');

        foreach ($userData as $user) {
            $xmlUser = $xmlData->addChild('user');

            $fullName = $user['name']['first'] . ' ' . $user['name']['last'];

            $xmlUser->addChild('name', $fullName);

            // Check if 'phone' key is present, otherwise, add a placeholder value
            $phone = isset($user['phone']) ? $user['phone'] : 'N/A';
            $xmlUser->addChild('phone', $phone);

            // Add 'email' and 'country' fields if available
            $xmlUser->addChild('email', isset($user['email']) ? $user['email'] : 'N/A');
            $xmlUser->addChild('country', isset($user['location']['country']) ? $user['location']['country'] : 'N/A');
        }

        return $xmlData->asXML();
    }

    public function sortUserData($userData)
    {       
        usort($userData, function ($a, $b) {
            return strcmp($b['name']['last'], $a['name']['last']);
        });

        return $userData;
    }

    public static function getUrl() {
        return self::$url;
    }
}
