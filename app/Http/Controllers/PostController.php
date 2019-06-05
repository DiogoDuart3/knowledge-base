<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $posts = Post::all()->sortBy('desc');
        return view('posts.index', compact('posts'));
    }
}
