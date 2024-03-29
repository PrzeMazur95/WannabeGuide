<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

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

Route::middleware('auth')->group( function () {
    Route::get('dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::controller(TopicController::class)->group(
        function () { 
            //route to save updated topic
            Route::patch('/topics/{topic}/update', 'update')->name('topics.update');
            //route to see all topics
            Route::get('/topics', 'index')->name('topics.all');
            //route to show form of creating new topic
            Route::get('/topics/create', 'create')->name('topics.create');
            //route to store new topic
            Route::post('/topics/create', 'store')->name('topics.store');
            //route to see specific topic
            Route::get('/topics/{topic}', 'show')->name('topics.show');
            //route to delete specific topic
            Route::delete('/topics/{topic}', 'destroy')->name('topics.delete');
            //route to edit specific topic
            Route::patch('/topics/{topic}', 'edit')->name('topics.edit');
            //route to search for specific topic by ajax call
            Route::get('/topicsSearch', 'search')->name('topics.search');
        }
    );
    Route::controller(CategoryController::class)->group(
        function () {
            //route to show form of creating new category
            Route::get('/category/create', 'create')->name('category.create');
            //route to store new category
            Route::post('/category/create', 'store')->name('category.store');
            //route to see all categories
            Route::get('/category', 'index')->name('category.all');
            //route to show all topis belongs to category
            Route::get('/category/{category}', 'show')->name('category.show');
            //route to edit specific category
            Route::patch('/category/{category}', 'edit')->name('category.edit');
            //route to save updated category
            Route::patch('/category/{category}/update', 'update')->name('category.update');
            //route to delete a category
            Route::delete('category/{category}', 'destroy')->name('category.delete');
        }
    );
    Route::controller(TagController::class)->group(
        function () {
            //route to show all tags
            Route::get('/tags', 'index')->name('tags.all');
             //route to create new tag
             Route::get('/tags/create', 'create')->name('tags.create');
            //route to store new tag
            Route::post('/tags/create', 'store')->name('tags.store');
            //route to delete a tag
            Route::delete('/tags/{tag}', 'destroy')->name('tag.delete');
            //route to show topis belogns to a tag
            Route::get('topicsRelatedTo/{tag}', 'topicsRelated')->name('topics.related');
        }
    );
});

require __DIR__.'/auth.php';
