<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enum\Api\LoggerMessages;
use App\Enum\Api\RestResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function catch($e,$loggerMsg, $restResponse, $responseCode)
    {
        // dd($this->logger);
        // $this->logger::error(LoggerMessages::ERROR_GET_ALL_TOPICS->value, ['error' => $e->getMessage()]);
        $this->logger::error($loggerMsg, ['error' => $e->getMessage()]);
        dd('try logger');

        return response()->json(RestResponses::ERROR_GET_ALL_TOPICS, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);
    }
}
