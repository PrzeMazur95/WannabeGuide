<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Category\StoreRequest;
use App\Enum\Api\LoggerMessages;
use App\Enum\Api\RestResponses;
use App\Models\Category;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
