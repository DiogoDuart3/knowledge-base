<?php

namespace App\Http\Controllers;

use App\models\Issue;
use App\models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::orderBy('id', 'ASC')->paginate(15);
        return view('manage-tags.index', compact('tags'));
    }

    public function show(){
        return redirect(route('tags.index'));
    }

    public function create(){
        $tag = new Tag();
        return view('manage-tags.create', compact('tag'));
    }

    public function store(Request $request){
        $data = $this->validate($request, ['name' => 'required|min:2']);
        $tag = Tag::create($data);
        session()->flash('success-message', 'Tag created successfully');
        return redirect(route('tags.index'));
    }

    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view('manage-tags.edit', compact('tag'));
    }

    public function update(Request $request, $id){
        $tag = Tag::findOrFail($id);
        $data = $this->validate($request, [
            'name' => 'required|min:2'
        ]);
        $tag->update($data);
        session()->flash('success-message', 'Tag edited successfully');
        return redirect(route('tags.index'));
    }

    public function delete($id){
        $tag = Tag::findOrFail($id);
        return view('manage-tags.delete', compact('tag'));
    }

    public function destroy($id){
        $tag = Tag::findOrFail($id);
        if($tag->issues->count() > 0){
            session()->flash('error-message', 'Tag can not be deleted because it is to be used in issues.');
            return redirect(route('tags.index'));
        }
        $tag->delete();
        session()->flash('success-message', 'Tag deleted successfully');
        return redirect(route('tags.index'));
    }

    public function issues($id){
        $issues = Tag::findOrFail($id)->issues()->paginate();
        return view('issue.index', compact('issues'));
    }

    public function list(){
        $tags = Tag::orderBy('id', 'ASC')->paginate(15);
        return view('manage-tags.list', compact('tags'));
    }
}
