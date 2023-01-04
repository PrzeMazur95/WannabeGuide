<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Enum\SessionMessages;
use App\Enum\ErrorMessages;
use App\Enum\LoggerMessages;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Construct for DI
     * 
     * @param Category $category
     */
    public function __construct(
        private Category $category,
        private Log $logger
    ) {
    }

    /**
     * Display view with all available categories.
     *
     * @return View
     */
    public function index(): View
    {
        return view('Category/all_categories', ['categories' => $this->category::all()]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return View
     */
    public function create(): View
    {
        return view('Category/new_category');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  StoreRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try{
            $this->category->create($request->validated());

        }catch (\Exception $e){

            $this->logger::error(LoggerMessages::ERROR_SAVE_NEW_CATEGORY->value, ['error' => $e->getMessage()]);

            return back()->with('db_error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB->value);
        }

        return redirect()->route('category.all')->with(SessionMessages::CATEGORY_ADDED->name, SessionMessages::CATEGORY_ADDED->value);

    }

    /**
     * Display all topicd belongs to specific category.
     *
     * @param  Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('Category/category', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('Category/edit_category', ['category'=>$category]);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  UpdateRequest  $request
     * @param  Category  $category
     * @return View
     */
    public function update(UpdateRequest $request, Category $category): View
    {
        try {

            $category->update($request->validated());

        } catch (\Exception $e) {

            $this->logger::error(LoggerMessages::ERROR_UPDATE_CATEGORY->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);

        }

        $request->session()->flash(SessionMessages::CATEGORY_UPDATED->name, SessionMessages::CATEGORY_UPDATED->value);

        return view('Category/all_categories', ['categories' => $this->category::all()]);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @param Request $request
     * @return View
     */
    public function destroy(Category $category, Request $request): View
    {
        try{
            $category->delete();

        } catch (\Exception $e) {
            
            $this->logger::error(LoggerMessages::ERROR_DELETE_CATEGORY->value, ['error' => $e->getMessage()]);

            return view('Error/error')->with('error', ErrorMessages::SMTH_WENT_WRONG_WITH_DB);
        }

        $request->session()->flash(SessionMessages::CATEGORY_DELETED->name, SessionMessages::CATEGORY_DELETED->value);

        return view('Category/all_categories', ['categories' => $this->category::all()]);
    }
}
