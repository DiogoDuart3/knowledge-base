@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Edit Tag <span class="text-muted">{{ $tag->name }}</span></h1>

        <a href="{{ route('tags.index') }}" class="btn text-primary mb-2" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        {{--        <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-2 float-right">Criar categoria</a>--}}

        <hr>
        @include('layouts.messages')
        {!! Form::model($tag, ['method'=>'PATCH', 'action'=>['TagController@update', $tag->id], 'class'=>'form-inline']) !!}
        <div class="form-group max-sm-5 mb-2 col-6">
            <label for="category-name" class="col-6">Category name</label>
            <div class="col-sm-6">
                {!! Form::text('name', null, ['class'=>'form-control', 'id'=>'category-name', 'placeholder'=>'Name']) !!}
            </div>
        </div>
        {!! Form::submit('Save', ['class'=>'btn btn-primary mb-2']) !!}
        {!! Form::close() !!}
    </div>
@endsection()