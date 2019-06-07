@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Manage user <span class="text-muted">{{ $user->name }}</span></h1>

        <a href="{{ route('manage-users.show', $user->id) }}" class="btn text-primary mb-2" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
        <a onclick="document.getElementById('editForm').submit()" class="btn mb-2 float-right text-success"
           data-toggle="tooltip"
           data-placement="top" title="Apply changes"><i class="fas fa-check-circle fa-2x"></i></a>

        <hr>
        @include('layouts.messages')

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['Admin\ManageUserController@update', $user->id], 'id'=>'editForm']) !!}
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                {!! Form::select('role_id', [1=>'User', 2=>'Admin'], $user->role_id, ['class'=>'form-control'] ) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                {!! Form::select('status', [1=>'Active', 2=>'Inactive'], ($user->deleted_at) ? 2 : 1, ['class'=>'form-control'] ) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">New password</label>
            <div class="col-sm-10">
                {!! Form::input('password', 'new_password', null, ['class'=>'form-control', 'placeholder'=>'Leave blank to not change']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection()