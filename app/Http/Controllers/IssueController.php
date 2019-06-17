<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Comment;
use App\models\Issue;
use App\models\Reply;
use App\models\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class IssueController extends Controller
{
    use SoftDeletes;
    function index()
    {
        $issues = Issue::orderBy('id', 'DESC')->paginate(8);
        return view('issue.index', compact('issues'));
    }

    function create()
    {
        $issue = new Issue();
        $categories = Category::all();
        $tags = Tag::all();
        return view('issue.create', compact('issue', 'categories', 'tags'));
    }

    function show($id)
    {
        $issue = Issue::findOrFail($id);
        $comment = new Comment();
        $reply = new Reply();
        return view('issue.show', compact('issue', 'comment', 'reply'));
    }

    function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required|min:3',
            'description' => 'required|min:10',
            'issue_solution' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ]);
        $data['user_id'] = Auth::id();
        $issue = Issue::create($data);
        if ($data['tags'][0]) {
            foreach ($data['tags'] as $tag_id) {
                $tag_id = Tag::findOrFail($tag_id);
                $issue->tags()->attach($tag_id);
            }
        }
        session()->flash('success-message', 'New issue added successfully');
        return redirect(route('home'));
    }

    function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('issue.edit', compact('issue', 'categories', 'tags'));
    }

    function update($id)
    {
        $issue = Issue::findOrFail($id);
        $data = $this->validate(request(), [
            'subject' => 'required|min:3',
            'description' => 'required|min:10',
            'issue_solution' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|exists:tags,id'
        ]);
        $issue->update($data);
        if (isset($data['tags'])) {
            $issue->tags()->detach();
            if ($data['tags'][0]) {
                foreach ($data['tags'] as $tag_id) {
                    $tag_id = Tag::findOrFail($tag_id);
                    $issue->tags()->attach($tag_id);
                }
            }
        }
        session()->flash('success-message', 'Issue successfully edited');
        return redirect(route('issue.show', $id));
    }

    function delete($id){
        $issue = Issue::findOrFail($id);
        return view('issue.delete', compact('issue'));
    }

    function destroy($id){
        $issue = Issue::findOrFail($id);
        $issue->delete();
        session()->flash('success-message', 'Issue deleted successfully');
        return redirect(route('home'));
    }

    function search(){
        $subject = Input::get('subject');
        $issues = Issue::where('subject', 'like', '%'.$subject.'%')->paginate(8);
        return view('issue.index', compact('issues'));
    }
}
