<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $posts = Post::all()->sortBy('desc');
        return view('post.index', compact('posts'));
    }

    function create(){
        $post = new Post();
        return view('post.create', compact('post'));
    }

    function show(){
        return view('post.show');
    }
}
