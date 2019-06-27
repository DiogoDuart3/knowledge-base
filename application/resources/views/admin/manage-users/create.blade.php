@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Create new user</h1>

        <a href="{{ route('manage-users.index') }}" class="btn text-primary" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>

        <hr>
        @include('layouts.messages')
        {!! Form::model($user, ['method'=>'POST', 'action'=>'Admin\ManageUserController@store']) !!}
        <div class="form-group">
            <label for="name">Name</label>
            {!! Form::text('name', '', ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'John Doe', 'autofocus'=>'true']) !!}
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            {!! Form::email('email', '', ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'email@example.com']) !!}
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            {!! Form::input('password', 'password', '', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>'password...']) !!}
        </div>
        <div class="form-group">
            <label for="email">Confirm Password</label>
            {!! Form::input('password', 'confirm_password', '', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>'password...']) !!}
        </div>
        <div class="form-group">
            <label for="roleSelect">Role</label>
            {!! Form::select('role_id', [1=>'User', 2=>'Admin'], '', ['class'=>'form-control'] ) !!}
        </div>
        {!! Form::submit('Create', ['class'=>'btn btn-primary mb-2']) !!}
        {!! Form::close() !!}
    </div>
@endsection()