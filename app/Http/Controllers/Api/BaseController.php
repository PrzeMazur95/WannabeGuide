<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Enum\Api\LoggerMessages;
use App\Enum\Api\RestResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    private $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function catch($e,$loggerMsg)
    {
        $this->logger::error($loggerMsg, ['error' => $e->getMessage()]);

    }
}
