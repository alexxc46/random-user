<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DataHandlerInterface;
use Illuminate\Support\Facades\Response;

class DataController extends Controller
{
    private $dataHandler;

    public function __construct(DataHandlerInterface $dataHandler)
    {
        $this->dataHandler = $dataHandler;
    }

    public function index()
    {        
        $count = $this->dataHandler->getDataLength();
        $responses = [];

        for ($i = 1; $i <= $count; $i++) {
            $responses[] = $this->dataHandler->fetchData();
        }

        $processedData = $this->dataHandler->processData($responses);

        $sortedUserData = $this->dataHandler->sortUserData($processedData);

        $xmlData = $this->dataHandler->extractAndConvertToXml($sortedUserData);

        $filename = 'sorted_users_' . time() . '.xml';

        file_put_contents(storage_path('app/' . $filename), $xmlData);

        return response()->download(storage_path('app/' . $filename))->deleteFileAfterSend(true);
    }
}
