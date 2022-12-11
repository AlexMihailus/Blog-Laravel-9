<?php

namespace App\Http\Controllers\Tag\Post;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->paginate(3);
        return view('tag.post.index', compact('posts'));
    }
}
