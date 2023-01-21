<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\Topics\StoreRequest;
use App\Http\Requests\Topics\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Enum\LoggerMessages;
use App\Enum\ErrorMessages;
use App\Enum\SessionMessages;
use Illuminate\View\View;
use App\Services\TagService;
use App\Services\TopicService;
use Illuminate\Database\Eloquent\Collection;

class TopicController extends Controller
{

    public function __construct(
        private Topic $topic,
        private Category $categories,
        private Log $logger,
        private Auth $auth,
        private Tag $tag,
        private TagService $tagService,
        private TopicService $topicService
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        try {

            $allTopics = $this->topic::all();
  
        } catch (\Exception $e){

            $this->logger::error(LoggerMessages::ERROR_GET_ALL_TOPICS->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);

        }
        return view('Topic/all_topics')->with('topics', $allTopics);
    }

    /**
     * Displays form to add a new topic
     *
     * @param Category $categories
     * @return View
     */
    public function create(Category $categories): View
    {
        return view('Topic/new_topic', ['categories' => $categories->all(), 'tags'=>$this->tag::all()]);
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param  StoreRequest  $request
     * @return View
     * 
     */
    public function store(StoreRequest $request): View
    {
        try {

            $topic = $this->topic->make($request->validated());
            $topic->user_id=$this->auth::user()->id;
            $topic->description=$this->topicService
                ->sanitizeDescripton($request->validated('description'));
            $topic->save();
            
            if ($request->tags_id) {

                $this->tagService->attachTagsToTopic($topic, $request->tags_id);
            }

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_SAVE_NEW_TOPIC->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }

        $request->session()->flash(SessionMessages::TOPIC_ADDED->name, SessionMessages::TOPIC_ADDED->value);

        return view('Topic/all_topics', ['topics'=>$this->topic::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Topic $topic
     * @return View
     */
    public function show(Topic $topic): View
    {
        return view('Topic/topic', ['topic'=>$topic]);
    }

    /**
     * Show the form for editing the specified topic.
     *
     * @param  Topic $topic
     * @return View
     */
    public function edit(Topic $topic): View
    {
        return view(
            'Topic/edit_topic', [
            'topic' => $topic, 
            'categories'=>$this->categories->all(), 
            'tags'=>$this->tag->all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Topic $topic
     * @return View
     */
    public function update(UpdateRequest $request, Topic $topic): View
    {
        try {

            $topic->update($request->validated());

            if ($request->tags_id) {

                $this->tagService->attachTagsToTopic($topic, $request->tags_id);
            }

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_UPDATE_TOPIC->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }

        $request->session()->flash(SessionMessages::TOPIC_UPDATED->name, SessionMessages::TOPIC_UPDATED->value);
        
        return view('Topic/all_topics', ['topics'=>$this->topic::all()]);
    }

    /**
     * Remove the specified topic from storage.
     *
     * @param  Topic $topic
     * @param Request $request
     * @return View
     */
    public function destroy(Topic $topic, Request $request): View
    {
        try {

            $topic->tags()->detach();
            $topic->delete();

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_DELETE_TOPIC->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }

        $request->session()->flash(SessionMessages::TOPIC_DELETED->name, SessionMessages::TOPIC_DELETED->value);

        return view('Topic/all_topics', ['topics'=>$this->topic::all()]);
    }

    /**
     * Method that return specific topic searched by user by typed phrase on dashboard page
     *
     * @param Request $request
     * @return Collection|Bool
     */
    public function search(Request $request): Collection|Bool
    {
        if (empty($request->search)) {
            
            return false;
        } else {
            if (!$topics = $this->topicService->findSearchingTopics($request->search)) {
                return false;
            }

            return $topics;
        }
    }
}