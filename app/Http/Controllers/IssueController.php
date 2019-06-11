<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Issue;
use App\models\Tag;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    function index(){
        $issues = Issue::orderBy('id', 'DESC')->get();
        return view('issue.index', compact('issues'));
    }

    function create(){
        $issue = new Issue();
        $categories = Category::all();
        $tags = Tag::all();
        return view('issue.create', compact('issue', 'categories', 'tags'));
    }

    function show(){
        return view('issue.show');
    }

    function store(){
        dd(request());
    }
}
