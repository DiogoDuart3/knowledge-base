<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    function index(){
        $posts = Issue::all()->sortBy('desc');
        return view('issue.index', compact('posts'));
    }

    function create(){
        $post = new Issue();
        return view('issue.create', compact('post'));
    }

    function show(){
        return view('issue.show');
    }
}
