<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Topic\StoreRequest;
use App\Http\Requests\Api\Topic\ShowRequest;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Enum\Api\RestResponses;
use App\Enum\Api\LoggerMessages;
use Illuminate\Support\Facades\Log;

class TopicController extends Controller
{
    public function __construct(
        private Topic $topic,
        private Response $responseCode,
        private Log $logger
    ){
    }

    /**
     * Display all available topics from db.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {

            $allTopics = $this->topic::all();

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_GET_ALL_TOPICS->value, ['error' => $e->getMessage()]);

            return response()->json(RestResponses::ERROR_GET_ALL_TOPICS, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);

        }
        return response()->json($allTopics, $this->responseCode::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        try { 
            
            $this->topic->create($request->validated());
        
        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_NEW_TOPIC_ADD->value, ['error' => $e->getMessage()]);

            return response()->json(RestResponses::ERROR_ADD_NEW_TOPIC, $this->responseCode::HTTP_BAD_REQUEST);
            
        }
        
        return response()->json(RestResponses::NEW_TOPIC_HAS_BEEN_ADDED, $this->responseCode::HTTP_CREATED);  
        
    }

    /**
     * Display the specified topic.
     *
     * @param  ShowRequest $request
     * @return JsonResponse
     */
    public function show(ShowRequest $request): JsonResponse
    {
        try {

            $topic = $this->topic::find($request->validated());

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_SHOW_SPECIFIC_TOPIC->value, ['error' => $e->getMessage()]);

            return response()->json(RestResponses::ERROR_GET_SPECIFIC_TOPIC, $this->responseCode::HTTP_BAD_REQUEST);
        }

        if(!$topic->first()){

            return response()->json(RestResponses::TOPIC_NOT_FOUND, $this->responseCode::HTTP_NOT_FOUND);
        }
        
        return response()->json($topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
