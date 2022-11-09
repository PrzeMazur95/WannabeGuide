<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function catch($e,$loggerMsg, $restResponse, $responseCode){

        $this->logger::error(LoggerMessages::ERROR_GET_ALL_TOPICS->value, ['error' => $e->getMessage()]);

        return response()->json(RestResponses::ERROR_GET_ALL_TOPICS, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);
    }
}
