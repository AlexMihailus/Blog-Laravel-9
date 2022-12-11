<?php

namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts()->paginate(3);
        return view('category.post.index', compact('posts'));
    }
}
