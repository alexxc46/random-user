<?php

namespace App\Interfaces;

interface DataHandlerInterface
{
    public function fetchData();
    public function processData($responses);
    public function extractAndConvertToXml($data);
    public function getDataLength();
}