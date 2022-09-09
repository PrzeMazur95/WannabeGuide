<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\Topics\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class TopicController extends Controller
{
    private $topic;

    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTopics = $this->topic::all();
        
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
        $topic->user_id=Auth::user()->id;
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
