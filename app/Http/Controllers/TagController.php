<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Enum\ErrorMessages;
use App\Enum\LoggerMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use App\Enum\SessionMessages;
use App\Http\Requests\Tag\StoreRequest;

class TagController extends Controller
{
    public function __construct(
        private Tag $tag,
        private Log $logger
    )
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('Tag/all_tags')->with('tags', $this->tag::all());
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
            $this->logger::error(LoggerMessages::ERROR_SAVE_NEW_TAG->value, ['error' => $e->getMessage()]);
            
            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }
        $request->session()->flash(SessionMessages::TAG_ADDED->name, SessionMessages::TAG_ADDED->value);

        return view('Tag/all_tags')->with('tags', $this->tag::all());
    }

    /**
     * Displays form to create a new tag.
     *
     * @return View
     */
    public function create(): View
    {
        return view('Tag/new_tag');
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param Tag $tag
     * @return View
     */
    public function destroy(Tag $tag, Request $request): View
    {
        try{ 
            $tag->topics()->detach();
            $tag->delete();
        } catch (\Exception $e){
            $this->logger::error(LoggerMessages::ERROR_DELETE_TAG->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }
        $request->session()->flash(SessionMessages::TAG_DELETED->name, SessionMessages::TAG_DELETED->value);

        return view('Tag/all_tags', ['tags'=>$this->tag::all()]);
    }

    /**
     * Return view with all topics related to a specific tag
     *
     * @param Tag $tag
     * @return View
     */
    public function topicsRelated(Tag $tag): View
    {
        return view('Tag/topics_related_to', ['tag'=>$tag]);
    }
}
