@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Manage Categories</h1>

        <a href="{{ route('home') }}" class="btn text-primary mb-2" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        <a href="{{ route('categories.create') }}" class="btn mb-2 float-right text-success"
           data-toggle="tooltip"
           data-placement="top" title="Add new category"><i class="fa fa-plus-circle fa-2x"></i></a>

        @include('layouts.messages')

        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Updated at</th>
                <th scope="col" class="text-center">Created at</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td class="text-center">{{ Carbon\Carbon::parse($category->updated_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-center">{{ Carbon\Carbon::parse($category->created_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-right">
                        <a href="{{ route('categories.edit', $category->id) }}" data-toggle="tooltip"
                           data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                        {!! Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete', 'class'=>'d-inline', 'id'=>'form-delete-'.$category->id]) !!}
                        <a href="#" onclick="$('#form-delete-{{ $category->id }}').submit()" data-toggle="tooltip"
                           data-placement="top" title="Delete"><i class="fa fa-trash text-danger"></i></a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()