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
    /**
     * Logger object used to log errors
     *
     * @var Log
     */
    private $logger;

    /**
     * Set up logger as a DI, to log errors
     *
     * @param Log $logger
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * Logging exception when smth went wrong with db query
     *
     * @param Exception $e
     * @param LoggerMessages $loggerMsg
     * @return void
     */
    public function catch($e, $loggerMsg): void
    {
        $this->logger::error($loggerMsg, ['error' => $e->getMessage()]);

    }
}
