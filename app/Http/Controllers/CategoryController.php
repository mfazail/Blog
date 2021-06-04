<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->get();
        $posts = Post::where('category', $category[0]->name)->orderBy('created_at', 'DESC')->get();
        return view('category-post', compact('posts'));
    }
}
