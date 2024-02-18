<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{

    public function index()
    {
        return view('admin.categories.categories');
    }

    public function noPublish()
    {
        return view('admin.categories.categories_noPublish');
    }


    public function createCategory()
    {
        return view('admin.categories.addCategory');
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        $isPublic = $request->has('is_public') ? 1 : 0;
        $validated['is_public'] = $isPublic;

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('category/images');
        }

        $category = Category::query()->create($validated);
        return redirect()->route('admin.category')->with(['message' => "Категория \"$category->title \" успешно добавлена "]);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
