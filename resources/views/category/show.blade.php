@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Category <span class="text-muted">{{ $category->name }}</span></h1>

        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary mb-2">Voltar</a>

        @include('layouts.messages')

        <h4 class="text-center">Issues</h4>
        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category->issues as $issue)
                <tr>
                    <th scope="row">{{$issue->id}}</th>
                    <td>{{$issue->subject}}</td>
                    <td class="text-right"><a class="btn btn-sm btn-outline-primary" href="{{ route('issues.show', $issue->id) }}">More</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()