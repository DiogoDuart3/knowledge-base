@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Create Category</h1>

        <a href="{{ route('categories.index') }}" class="btn text-primary mb-2" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        {{--        <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-2 float-right">Criar categoria</a>--}}

        <hr>
        @include('layouts.messages')
        {!! Form::model($category, ['method'=>'POST', 'action'=>'CategoryController@store', 'class'=>'form-inline']) !!}
        <div class="form-group max-sm-5 mb-2 col-6">
            <label for="category-name" class="col-6">Category name</label>
            <div class="col-sm-6">
                {!! Form::text('name', '', ['class'=>'form-control', 'id'=>'category-name', 'placeholder'=>'Name']) !!}
            </div>
        </div>
        {!! Form::submit('Create', ['class'=>'btn btn-primary mb-2']) !!}
        {!! Form::close() !!}
    </div>
@endsection()