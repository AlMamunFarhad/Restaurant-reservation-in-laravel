<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryStoreRequest;
use League\Flysystem\StorageAttributes;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('public/categories');

        Category::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
        ]);

        return to_route('admin.categories.index')->with('success', 'Category created Successfully.');
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $image = $category->image;
        if ($request->hasFile('image')) {
            if ($category->image && Storage::exists($category->image)) {
                Storage::delete($category->image);
            }
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return to_route('admin.categories.index')->with('success', 'Category successfully updated.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();

        return to_route('admin.categories.index')->with('delete', 'Category successfully deleted.');

    }
}
