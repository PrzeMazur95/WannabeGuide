<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Enum\ErrorMessages;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Tag\StoreRequest;

class TagController extends Controller
{
    public function __construct(private Tag $tag)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  StoreRequest  $request
     * @return View
     */
    public function store(StoreRequest $request): View
    {
        try{
            $tag = $this->tag::create($request->validated());
        } catch (\Exception $e) {
            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }

        return view('Tag/all_tags')->with($this->tag::all());
    }

    /**
     * Displays form to create a new tag.
     *
     * @return View
     */
    public function create(Request $request): View
    {
        return view('Tag/new_tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
