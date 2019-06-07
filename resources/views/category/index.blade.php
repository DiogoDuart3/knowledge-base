@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Gerir Categorias</h1>

        <a href="{{ route('home') }}" class="btn btn-outline-primary mb-2">Voltar</a>
        <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-2 float-right">Criar categoria</a>

        @include('layouts.messages')

        <table class="table table-sm table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col" class="text-center">Criado em</th>
                <th scope="col" class="text-center">Atualizado em</th>
                <th scope="col" class="text-right">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td class="text-center">{{ Carbon\Carbon::parse($category->created_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-center">{{ Carbon\Carbon::parse($category->updated_at)->format('H:i | d-m-Y') }}</td>
                    <td class="text-right">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm">Editar</a>
                        {!! Form::open(['route'=>['categories.destroy', $category->id], 'method'=>'delete', 'class'=>'d-inline']) !!}
                        {!! Form::submit('Apagar', ['class'=>'btn btn-outline-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()