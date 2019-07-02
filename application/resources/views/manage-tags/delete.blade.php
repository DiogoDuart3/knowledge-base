@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card ml-auto mr-auto mt-5" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title">Delete tag <span class="text-muted">{{ $tag->name }}</span></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                        Are you sure you want to delete this tag?
                        <br>
                        This action is permanent and can not be reversed.</p>
                    {!! Form::model($tag, ['method'=>'DELETE','action' => ['TagController@destroy', $tag->id], 'id'=>'FormDelete']) !!}
                    <a href="{{ route('tags.index') }}" class="card-link">Cancel</a>
                    <a href="#" class="text-danger float-right card-link" onclick="$('#FormDelete').submit()">Delete</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection