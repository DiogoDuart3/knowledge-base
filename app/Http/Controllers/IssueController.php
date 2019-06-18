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
use Illuminate\Support\Facades\DB;
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

    function delete($id)
    {
        $issue = Issue::findOrFail($id);
        return view('issue.delete', compact('issue'));
    }

    function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        session()->flash('success-message', 'Issue deleted successfully');
        return redirect(route('home'));
    }

    function search()
    {
        $subject = Input::get('subject');
//        foreach (Issue::where('subject', 'ILIKE', '%' . $subject . '%')->get() as $issue) {
//            $issues[$issue->id] = $issue;
//        }
//        foreach (Tag::where('name', 'ILIKE', '%' . $subject . '%')->first()->issues as $issue) {
//            $issues[$issue->id] = $issue;
//        }
//        foreach (Category::where('name', 'ILIKE', '%'.$subject.'%')->first()->issues as $issue) {
//            $issues[$issue->id] = $issue;
//        }

//        $issues = DB::table('issues')
//                    ->select('*')
//                    ->join('issue_tag', 'issue_tag.issue_id', '=', 'issues.id')
//                    ->join('tags', 'issue_tag.tag_id', '=', 'tags.id')
//                    ->join('categories', 'issues.category_id', '=', 'categories.id')
//                    ->where('tags.id', 2)->paginate(8);

        $issues_id = Issue::leftJoin('issue_tag', 'issue_tag.issue_id', '=', 'issues.id')
            ->leftJoin('tags', 'issue_tag.tag_id', '=', 'tags.id')
            ->leftJoin('categories', 'categories.id', '=', 'issues.category_id')
            ->where('issues.subject', 'ILIKE', '%' . $subject . '%')
            ->orWhere('categories.name', 'ILIKE', '%' . $subject . '%')
            ->orWhere('tags.name', 'ILIKE', '%' . $subject . '%')
            ->get('issues.id');

        $issues = Issue::whereIn('id', $issues_id)->orderBy('id', 'DESC')->paginate(8);

//        dd($issues);

//        dd(Tag::where('name', 'ILIKE', '%'.$subject.'%')->get()->find());
//        $issues = Issue::where('subject', 'ILIKE', '%'.$subject.'%')->orWhere(
//            'category_id', '=', Category::where('name', 'ILIKE', '%'.$subject.'%')->first()->id
//        )->orWhere(
//            'issues.id'
//        )->paginate(8);

//        $issues->paginate(8);
//        $issues = $tag->issues->get();
//        $issues->paginate(8);
//        foreach(Tag::where('name', 'ILIKE', '%'.$subject.'%')->get() as $tag){
//            $issues += $tag->issue;
//        }
        if ($issues->count() == 0) abort(404);
        return view('issue.index', compact('issues'));
    }
}
