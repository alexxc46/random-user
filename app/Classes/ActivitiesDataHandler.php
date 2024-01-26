<?php

namespace App\Classes;

class ActivitiesDataHandler extends BaseDataHandler
{
    private $url = 'https://www.boredapi.com/api/activity';
    
    public function processData($responses){
        // Implementation for processing data
    }

    public function extractAndConvertToXml($data){
        // Implementation for extracting and converting data to XML
    }

    public function getUrl() {
        return $this->url;
    }
}