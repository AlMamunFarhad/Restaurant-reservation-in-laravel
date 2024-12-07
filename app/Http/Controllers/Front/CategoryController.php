<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('front.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {

        return view('front.categories.show', compact('category'));
    }
}
