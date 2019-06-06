@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Criar Categoria</h1>

        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary mb-2">Voltar</a>
        {{--        <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-2 float-right">Criar categoria</a>--}}

        <hr>
        @include('layouts.messages')
        {!! Form::model($category, ['method'=>'POST', 'action'=>'CategoryController@store', 'class'=>'form-inline']) !!}
        <div class="form-group max-sm-5 mb-2 col-6">
            <label for="category-name" class="col-6">Nome da categoria</label>
            <div class="col-sm-6">
                {!! Form::text('name', '', ['class'=>'form-control', 'id'=>'category-name', 'placeholder'=>'Nome']) !!}
            </div>
        </div>
        {!! Form::submit('Criar', ['class'=>'btn btn-primary mb-2']) !!}
        {!! Form::close() !!}
    </div>
@endsection()