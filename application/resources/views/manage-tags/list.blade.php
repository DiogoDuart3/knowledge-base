@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Tags</h1>

        <a href="{{ route('home') }}" class="btn text-primary" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>

        @include('layouts.messages')

        <table class="table table-sm table-hover mt-2" style="font-size: 150%;">
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td><a href="{{ route('tags.issues', $tag->id) }}">{{ $tag->name }}</a></td>
                    <td class="text-right">
                        <a href="{{ route('tags.issues', $tag->id) }}" data-toggle="tooltip"
                           data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
@endsection