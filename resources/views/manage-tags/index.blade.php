@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Manage Tags</h1>

        <a href="{{ route('home') }}" class="btn text-primary" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        <a href="{{ route('tags.create') }}" class="btn text-success mb-2 float-right" data-toggle="tooltip"
           data-placement="top" title="Add new tag"><i class="fa fa-plus-circle fa-2x"></i></a>

        @include('layouts.messages')

        <table class="table table-sm table-hover mt-2">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Created at</th>
                <th scope="col" class="text-center">Updated at</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>{{ $tag->name }}</td>
                    <td class="text-center">{{ Carbon\Carbon::parse($tag->created_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-center">{{ Carbon\Carbon::parse($tag->updated_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-right">
                        <a href="{{ route('tags.edit', $tag->id) }}" data-toggle="tooltip"
                           data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('tags.delete', $tag->id) }}" data-toggle="tooltip"
                           data-placement="top" title="Delete"><i class="fa fa-trash text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
@endsection