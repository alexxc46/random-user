<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DataHandlerInterface;
use App\Classes\UsersDataHandler;
use App\Classes\ActivitiesDataHandler;
use App\Classes\BaseDataHandler;

class DataController extends Controller
{
    private $dataHandler;

    public function __construct(DataHandlerInterface $dataHandler)
    {
        $this->dataHandler = $dataHandler;
    }

    public function index()
    {
        

        $responses = [];
        $count = $this->dataHandler->getDataLength();

        for ($i = 1; $i <= $count; $i++) {
            $responses[] = $this->dataHandler->fetchData();
        }
        dd($responses);
        return $this->dataHandler->processData($responses);
    }
}
