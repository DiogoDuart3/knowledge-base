<?php

namespace App\Http\Controllers\Admin;

use App\models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'asc')->paginate(15);
        return view('admin.manage-users.index', compact('users'));
    }

    public function create(){
        $user = new User();
        return view('admin.manage-users.create', compact('user'));
    }

    public function store(Request $request){
        $data = $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|max:20|same:password',
            'role_id' => 'required|numeric|exists:roles,id'
        ],[
            'role_id.required' => 'The role field must be valid.'
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        session()->flash('success-message', 'User account create with sucess (id:'.$user->id.')');
        return redirect(route('admin.manage-users.index'));
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('admin.manage-users.show', compact('user'));
    }
}
