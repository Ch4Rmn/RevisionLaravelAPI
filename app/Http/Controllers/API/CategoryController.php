<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return $this->successResponse($categories, 'categories List');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        $validator = $request->validated();
        $category = Category::create($validator);
        if ($category) {
            return $this->successResponse($category, 'category create');
        }
        return $this->errorResponse('categories created fail');
    }

    /**
     * Display the specified resource.
     */

    // public function show(Category $category)
    // {
    //     //
    //     // if ($category) {
    //     //     return $this->successResponse($category, 'category ');
    //     // } else {
    //     //     return $this->errorResponse('category no have');
    //     // }
    // }
    public function show(Category $category, string $id)
    {
        $category = Category::where('id', $id)->first();
        if ($category) {
            return $this->successResponse($category, 'category ');
        } else {
            return $this->errorResponse('category no have');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        //
        $validator = $request->validated();
        $category = Category::where('id', $id)->first();

        if ($category->update($validator)) {
            return $this->successResponse($category, 'category updated');
        } else {
            return $this->errorResponse('category no update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::where('id', $id)->first();
        if ($category->delete()) {
            return $this->successResponse($category, 'category delete ');
        } else {
            return $this->errorResponse('category did not delete');
        }

    }
}
