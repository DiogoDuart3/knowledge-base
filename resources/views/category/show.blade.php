@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Categoria {{$category->name}}</h1>

        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary mb-2">Voltar</a>

        @include('layouts.messages')

        <h4 class="text-center">Posts</h4>
        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col" class="text-right">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category->posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td class="text-right"><a class="btn btn-sm btn-outline-primary" href="{{ route('posts.show', $post->id) }}">Ver</a></td>
                </tr>
            @endforeach
            {{--            @foreach($categories as $category)--}}
            {{--                <tr>--}}
            {{--                    <th scope="row">{{ $category->id }}</th>--}}
            {{--                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>--}}
            {{--                    <td class="text-center">{{ Carbon\Carbon::parse($category->created_at)->format('H:i | d-m-Y') }}</td>--}}
            {{--                    <td class="text-center">{{ Carbon\Carbon::parse($category->created_at)->format('H:i | d-m-Y') }}</td>--}}
            {{--                    <td class="text-right">--}}
            {{--                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>--}}
            {{--                        {!! Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete', 'class'=>'d-inline']) !!}--}}
            {{--                        {!! Form::submit('Apagar', ['class'=>'btn btn-outline-danger btn-sm']) !!}--}}
            {{--                        {!! Form::close() !!}--}}
            {{--                    </td>--}}
            {{--                </tr>--}}
            {{--            @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection()