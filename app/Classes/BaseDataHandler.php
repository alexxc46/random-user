<?php

namespace App\Classes;
use App\Interfaces\DataHandlerInterface;
use Illuminate\Support\Facades\Http;

abstract class BaseDataHandler implements DataHandlerInterface
{
    // Common methods or properties for both Users and Activities data handling

    private $dataLength = 2;

    public function fetchData()
    {
        $url = $this->getUrl();
        
        return Http::get($url);
    }

    public abstract function processData($responses);

    public abstract function extractAndConvertToXml($data);

    protected abstract static function getUrl();

    public function getDataLength() {
        return $this->dataLength;
    }
}