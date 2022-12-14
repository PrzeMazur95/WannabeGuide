<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Http\Requests\Api\Category\ShowRequest;
use App\Http\Requests\Api\Category\DeleteRequest;
use App\Enum\Api\LoggerMessages;
use App\Enum\Api\RestResponses;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends BaseController
{

    /**
     * Category class construct
     *
     * @param Category $category
     * @param Log $logger
     * @param Response $responseCode
     */
    public function __construct(
        private Category $category, 
        private Log $logger,
        private Response $responseCode,
        private CategoryService $categoryService,
    ) {
        parent::__construct($logger);
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try{
            return response()->json($this->category::all());

        } catch (\Exception $e) {
            $this->catch($e, LoggerMessages::ERROR_GET_ALL_CATEGORIES->value);

            return response()->json(RestResponses::ERROR_GET_ALL_CATEGORIES, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);
           
        }
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  StoreRequest  $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        try{
            $this->category->create($request->validated());

        } catch (\Exception $e) {
            $this->catch($e, LoggerMessages::ERROR_NEW_CATEGORY_ADD->value);

            return response()->json(RestResponses::ERROR_ADD_NEW_CATEGORY, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json(RestResponses::NEW_CATEGORY_HAS_BEEN_ADDED, $this->responseCode::HTTP_CREATED);
    }

    /**
     * Display the specified category.
     *
     * @param ShowRequest
     * @return JsonResponse
     */
    public function show(ShowRequest $request): JsonResponse
    {
        try {
            return response()->json($this->category::find($request->id));
            
        }catch (\Exception $e)  {
            $this->catch($e, LoggerMessages::ERROR_SHOW_SPECIFIC_CATEGORY->value);

            return response()->json(RestResponses::ERROR_ADD_NEW_CATEGORY, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  DeleteRequest $request
     * @return JsonResponse
     */
    public function destroy(DeleteRequest $request): JsonResponse
    {
        if ($this->categoryService->ifUserIsAnOwnerOfGivenCategory($request->id, $request->user_id)) {
            return response()->json(RestResponses::USER_IS_NOT_AN_OWNER_OF_THIS_CATEGORY, $this->responseCode::HTTP_UNAUTHORIZED);
        } else {
            try{
                $this->category::find($request->id)->delete();
            } catch (\Exception $e){
                $this->catch($e, LoggerMessages::ERROR_DELETE_SPECIFIC_CATEGORY->value);

                return response()->json(RestResponses::ERROR_DELETE_CATEGORY, $this->responseCode::HTTP_INTERNAL_SERVER_ERROR);
            }

            return response()->json(RestResponses::CATEGORY_HAS_BEEN_DELETED, $this->responseCode::HTTP_NO_CONTENT);
        } 
    }
}
