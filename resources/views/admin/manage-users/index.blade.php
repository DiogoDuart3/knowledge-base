@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Manage Users</h1>

        <a href="{{ route('home') }}" class="btn text-primary" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        <a href="{{ route('manage-users.create') }}" class="btn text-success mb-2 float-right" data-toggle="tooltip"
           data-placement="top" title="Add new user"><i class="fa fa-plus-circle fa-2x"></i></a>

        @include('layouts.messages')

        <table class="table table-sm table-hover mt-2">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" class="text-center">Created at</th>
                <th scope="col" class="text-center">Updated at</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td><a href="{{ route('manage-users.show', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td class="text-center">{{ Carbon\Carbon::parse($user->created_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-center">{{ Carbon\Carbon::parse($user->updated_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-right">
                        <a href="{{ route('manage-users.show', $user->id) }}" class="btn btn-outline-primary btn-sm">Manage</a>
                        {{--                        {!! Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete', 'class'=>'d-inline']) !!}--}}
                        {{--                        {!! Form::submit('Apagar', ['class'=>'btn btn-outline-danger btn-sm']) !!}--}}
                        {{--                        {!! Form::close() !!}--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection()