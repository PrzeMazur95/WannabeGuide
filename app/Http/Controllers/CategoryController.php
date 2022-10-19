<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Construct for DI
     * 
     * @param Category $category
     */
    public function __construct(
        private Category $category
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

            return redirect()->route('category.all');
        }catch (\Exception $e){
            return back()->with('wrong', $e->getmessage());
        }

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
