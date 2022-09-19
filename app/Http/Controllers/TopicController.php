<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\Topics\StoreRequest;
use App\Http\Requests\Topics\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Enum\LoggerMessages;
use App\Enum\ErrorMessages;
use App\Enum\SessionMessages;
use Illuminate\View\View;

class TopicController extends Controller
{

    public function __construct(
        private Topic $topic,
        private Log $logger,
        private Auth $auth
    ){
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
     * Show the form for creating a new Topic.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Topic/new_topic');
    }

    /**
     * Store a newly created topic in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $topic=$this->topic;

        $topic->name=$request->name;
        $topic->description=$request->description;
        $topic->category=1;
        $topic->user_id=$this->auth::user()->id;

        try {

            $topic->save();

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_SAVE_NEW_TOPIC->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);

        }

        $request->session()->flash(SessionMessages::TOPIC_ADDED->name, SessionMessages::TOPIC_ADDED->value);

        return redirect()->route('topics.all');
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
        return view('Topic/edit_topic', ['topic' => $topic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Topic $topic
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        return redirect()->route('topics.all');
    }

    /**
     * Remove the specified topic from storage.
     *
     * @param  Topic $topic
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Topic $topic, Request $request): RedirectResponse
    {
        $topic->delete();

        $request->session()->flash(SessionMessages::TOPIC_DELETED->name, SessionMessages::TOPIC_DELETED->value);

        return redirect()->route('topics.all');

    }
}
