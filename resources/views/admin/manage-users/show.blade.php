@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Manage user <span class="text-muted">{{ $user->name }}</span></h1>

        <a href="{{ route('manage-users.index') }}" class="btn text-primary mb-2" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
        <a href="{{ route('manage-users.edit', $user->id) }}" class="btn mb-2 float-right text-primary" data-toggle="tooltip"
           data-placement="top" title="Edit"><i class="fas fa-pencil-alt fa-2x"></i></a>

        <hr>
        @include('layouts.messages')

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <span class="form-control-plaintext">{{ $user->name }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <span class="form-control-plaintext">{{ $user->email }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <span class="form-control-plaintext">{{ $user->role->name }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Updated at</label>
            <div class="col-sm-10">
                <span class="form-control-plaintext">{{ Carbon\Carbon::parse($user->updated_at)->format('H:i | d-m-Y') }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Created at</label>
            <div class="col-sm-10">
                <span class="form-control-plaintext">{{ Carbon\Carbon::parse($user->created_at)->format('H:i | d-m-Y') }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <span class="form-control-plaintext"><i class="far fa-check-circle fa-2x text-success" data-toggle="tooltip"
                                                        data-placement="top" title="Active"></i>
                <i class="far fa-times-circle fa-2x text-danger" data-toggle="tooltip"
                   data-placement="top" title="Inactive"></i></span>
            </div>
        </div>
    </div>
@endsection()