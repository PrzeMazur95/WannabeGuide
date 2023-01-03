<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Topic\StoreRequest;
use App\Http\Requests\Api\Topic\ShowRequest;
use App\Http\Requests\Api\Topic\UpdateRequest;
use App\Http\Requests\Api\Topic\DeleteRequest;
use App\Models\Topic;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Enum\Api\RestResponses;
use App\Enum\Api\LoggerMessages;
use Illuminate\Support\Facades\Log;
use App\Services\UserService;
use App\Services\TopicService;

class TopicController extends Controller
{
    /**
     * TopicController class constructor
     * 
     * @param Topic        $topic
     * @param Response     $responseCode
     * @param Log          $logger
     * @param UserService  $UserService
     * @param TopicService $TopicService
     */
    public function __construct(
        private Topic $topic,
        private Response $responseCode,
        private Log $logger,
        private UserService $UserService,
        private TopicService $TopicService
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
        if(!$allTopics->all()) {
            
            return response()->json(RestResponses::TOPICS_NOT_FOUND, $this->responseCode::HTTP_OK);
        }

        return response()->json($allTopics, $this->responseCode::HTTP_OK);
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
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @return JsonResponse
     */
    public function update(UpdateRequest $request): JsonResponse
    {
        try {

            $topic = $this->topic::find($request->topic_id);

            if(!$topic){

                return response()->json(RestResponses::TOPIC_NOT_FOUND, $this->responseCode::HTTP_NOT_FOUND);
            }
            
            $topic->update($request->validated());

            return response()->json(RestResponses::TOPIC_HAS_BEEN_UPDATED, $this->responseCode::HTTP_OK);

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_UPDATE_TOPIC->value, ['error' => $e->getMessage()]);

            return response()->json(RestResponses::ERROR_UPDATE_TOPIC, $this->responseCode::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified topic from storage.
     *
     * @param  DeleteRequest $request
     * @return JsonResponse
     */
    public function destroy(DeleteRequest $request): JsonResponse
    {
        if (!$this->UserService->checkIfUserIsAnOwnerOfSpecificTopic($request->user_id, $request->id) ) {

            return response()->json(RestResponses::USER_IS_NOT_AN_OWNER, $this->responseCode::HTTP_NOT_FOUND);            
        }
        
        try {
            
            $this->topic::find($request->id)->first()->delete();

            return response()->json(RestResponses::TOPIC_HAS_BEEN_DELETED, $this->responseCode::HTTP_NO_CONTENT);
        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_DELETE_TOPIC->value, ['error' => $e->getMessage()]);

            return response()->json(RestResponses::ERROR_DELETE_TOPIC, $this->responseCode::HTTP_BAD_REQUEST);
        }
        

    }
}
