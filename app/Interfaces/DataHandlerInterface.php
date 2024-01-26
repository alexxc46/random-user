<?php

namespace App\Interfaces;

interface DataHandlerInterface
{
    public function fetchData();
    public function processData($responses);
    public function extractAndConvertToXml($userData);
    public function sortUserData($userData);
    public function getDataLength();
}