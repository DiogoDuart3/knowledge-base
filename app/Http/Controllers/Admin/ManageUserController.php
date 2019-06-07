<?php

namespace App\Http\Controllers\Admin;

use App\models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->withTrashed()->paginate(15);
        return view('admin.manage-users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('admin.manage-users.create', compact('user'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|max:20|same:password',
            'role_id' => 'required|numeric|exists:roles,id'
        ], [
            'role_id.required' => 'The role field must be valid.'
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        session()->flash('success-message', 'User account create with sucess (id:' . $user->id . ')');
        return redirect(route('admin.manage-users.index'));
    }

    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('admin.manage-users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('admin.manage-users.edit', compact('user'));
    }

    public function update($id)
    {
        $data = $this->validate(request(), [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'role_id' => 'required|numeric|exists:roles,id',
            'status' => 'required|numeric|min:1|max:2',
            'new_password' => 'nullable|min:6'
        ], [
            'role_id.required' => 'The role field must be valid.'
        ]);
        $user = User::withTrashed()->findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if ($id != 1) $user->role_id = $data['role_id']; else session()->flash('error-message', 'You can not edit the administrator account role');
        if ($data['new_password']) $user->password = $data['new_password'];

        $user->save();

        if ($data['status'] == 1) {
            $user->restore();
        } else if ($data['status'] == 2) {
            if ($id == 1)
                session()->flash('error-message', 'You can not edit the administrator account status');
            else
                $user->delete();
        }

        session()->flash('success-message', 'User edited with success');

        return redirect(route('manage-users.show', $user->id));
    }
}
