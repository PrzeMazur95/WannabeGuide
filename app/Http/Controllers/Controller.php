<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Topic;
use App\Enum\LoggerMessages;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 
     */
    public function __construct(
        private Category $category, 
        private Tag $tag, 
        private Topic $topic,
        private Log $logger
    )
    {
    }

    /**
     * Returns dashobard view, with counted topics, tags, categories
     * 
     * @return View
     */
    public function dashboard($categoriesCount = 0, $tagsCount = 0, $topicsCount = 0): View
    {
        try {
            $categoriesCount = $this->category::all()->count();
            $tagsCount = $this->tag::all()->count();
            $topicsCount = $this->topic::all()->count();
        } catch ( \Exception $e) { 
            
            $this->logger::error(LoggerMessages::ERROR_CONNECTION_WITH_DB->value, ['error' => $e->getMessage()]);
        }
        
        return view('dashboard', [
            'categoriesCount'=>$categoriesCount, 
            'tagsCount'=>$tagsCount, 
            'topicsCount'=>$topicsCount
        ]);
    }
}
