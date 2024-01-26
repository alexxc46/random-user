<?php

namespace App\Classes;

class UsersDataHandler extends BaseDataHandler
{
    private static $url = 'https://randomuser.me/api/';

    public function processData($responses){

    }
    public function extractAndConvertToXml($data){
        
    }

    public static function getUrl() {
        return self::$url;
    }
}

// создадим сервис, в котором определим, какой именно класс будет юзаться и сбайндим его в этом сервисе или еще где.
// это будет аналог резолвера из предыдущего варианта
// а в коде все останется как было