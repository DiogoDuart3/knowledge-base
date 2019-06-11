<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    function index(){
        $issues = Issue::orderBy('id', 'DESC')->get();
        return view('issue.index', compact('issues'));
    }

    function create(){
        $issue = new Issue();
        return view('issue.create', compact('issue'));
    }

    function show(){
        return view('issue.show');
    }
}
