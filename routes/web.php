<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::controller(TopicController::class)->group(function () { 
        //route to see all topics
        Route::get('/topics','index')->name('topics.all');
        //route to show form of creating new topic
        Route::get('/topics/create', 'create')->name('topics.create');
        //route to store new topic
        Route::post('/topics/create', 'store')->name('topics.store');
    });
});

require __DIR__.'/auth.php';
