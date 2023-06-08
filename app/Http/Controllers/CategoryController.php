<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryPostRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function index() {
        return Category::all();
    }

    public function store(CategoryPostRequest $request) {
    }

    public function show(Category $category) {
        return $category->cars;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryPostRequest $request, Category $category) {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        $category->delete();
    }
}
