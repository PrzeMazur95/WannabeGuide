<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TopicController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(TopicController::class)->group(function () {
    //route to see all existing topics
    Route::get('topics', 'index');
    //route to store new topic
    Route::post('topics/store', 'store');
    //route to show speific topic
    Route::get('topic', 'show');
    //route to update specific topic
    Route::post('topic/update', 'update');
});
