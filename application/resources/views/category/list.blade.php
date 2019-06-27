@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Categories</h1>

        <a href="{{ route('home') }}" class="btn text-primary mb-2" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>

        @include('layouts.messages')

        <table class="table table-sm table-hover mt-2" style="font-size: 150%;">
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                    <td class="text-right">
                        <a href="{{ route('categories.show', $category->id) }}" data-toggle="tooltip"
                           data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection()