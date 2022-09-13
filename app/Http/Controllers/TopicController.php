<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\Topics\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use App\Enum\LoggerMessages;
use App\Enum\ErrorMessages;
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
        $topic->save();
        
        $request->session()->flash('Topic_added', 'Topic has been succesfully added!');

        return redirect()->route('topics.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
