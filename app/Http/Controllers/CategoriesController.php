<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category\DestroyRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Requests\Category\StoreRequest;
use Gate;
use Illuminate\Contracts\Support\Renderable;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * To create resource here is the view returned function.
     *
     *@return Renderable
     */
    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage and return to redirect view.
     *
     * @param StoreRequest $request
     * @return
     */
    public function store(StoreRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    /**
     * To edit he specified resource returned to edit view.
     *
     * @param Category $category
     * @return Renderable
     */
    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Category $category
     * @return
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Renderable
     */
    public function show(Category $category)
    {
        abort_if(Gate::denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category->delete();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequest $request
     * @return Response
     */
    public function massDestroy(DestroyRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
