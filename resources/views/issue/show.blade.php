@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{ route('home') }}" class="btn text-primary" data-toggle="tooltip"
               data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        </div>
        <div class="row">
            @include('layouts.messages')
        </div>
        <div class="row mt-5 ml-1 mr-1">
            <div class="card col-12 p-0" mb-5>
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">{{ $issue->subject }}</h2>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm">
                            <img
                                    src="data:image/png;base64,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"
                                    alt="..." class="rounded-circle" style="width: 3vh; height: 3vh">
                            <span><strong>{{ $issue->user->name }}</strong></span></div>
                        <div class="col-sm text-center">
                            <span>
                                {{ $issue->comments->count() }} <i class="fa fa-comments"></i>
                            </span>
                        </div>
                        <div class="col-sm">
                            <span class="float-right">{{ Carbon\Carbon::parse($issue->created_at)->format('H:i | d-m-Y') }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $issue->description !!}
                    @if($issue->issue_solution)
                        <hr>
                        <h3 class="text-center">Solution</h3>
                        <hr>
                    @endif
                    {!! $issue->issue_solution !!}
                </div>
                <div class="card-footer text-center">
                    <a data-toggle="tooltip" href="{{ route('issue.edit', $issue->id) }}" class="text-dark"
                       data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                    <a data-toggle="tooltip" href="{{ route('issue.delete', $issue->id) }}" class="text-dark ml-5"
                       data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <div class="row mt-5 w-100">
                <div class="col-12">
                    <h2 class="text-center">Comments <i class="fa fa-comment"></i></h2>
                    <hr class="w-75">
                </div>
            </div>
            <div class="row w-100">
                @foreach($issue->comments as $comment)
                    <div class="col-12 mt-3">
                        <img src="{{ asset('img/icon/comment.svg') }}" alt="..." style="width: 2vh; height: 2vh;">
                        <span><strong>{{ $comment->user->name }}</strong> <small>| {{ Carbon\Carbon::parse($comment->created_at)->format('H:i | d-m-Y') }}</small></span>
                        <div class="float-right">
                            <span class="newReply">
                                <button href="#" class="btn btn-sm btn-add-reply" data-toggle="tooltip"
                                        data-placement="top" data-comment_id="{{ $comment->id }}" title="Reply"><i
                                            class="fa fa-reply fa-flip-vertical"></i></button>
                            </span>
                            <span data-toggle="modal" data-target="#deleteCommentModal" data-comment_id="{{ $comment->id }}">
                                @if(Auth::user() && (Auth::user()->id == $comment->user->id || Auth::user()->isAdmin()))
                                    <a href="#" class="btn btn-sm" data-toggle="tooltip"
                                       data-placement="top" title="Delete"><i class="fa fa-trash text-danger"></i></a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['comment.destroy', $comment->id], 'class'=>'d-none', 'id'=>'deleteComment_'.$comment->id]) }}
                                    {{ Form::close() }}
                                @endif
                            </span>
                        </div>
                        <div class="content ml-4 mt-1 mr-5">
                            <div class="comment text-muted text-justify">
                                {{ $comment->body }}
                            </div>
                            @foreach($comment->replies as $reply)
                                <div class="reply mt-3">
                                    <img src="{{ asset('img/icon/reply.svg') }}" alt="..."
                                         style="width: 2vh; height: 2vh;">
                                    <span><strong>{{ $reply->user->name }}</strong> <small>| {{ Carbon\Carbon::parse($reply->created_at)->format('H:i | d-m-Y') }}</small></span>
                                    <span data-toggle="modal" data-target="#deleteReplyModal"
                                          data-reply_id="{{ $reply->id }}">
                                 @if(Auth::user() && (Auth::user()->id == $comment->user->id || Auth::user()->isAdmin()))
                                            <a href="#" class="btn btn-sm" data-toggle="tooltip"
                                               data-placement="top" title="Delete"><i
                                                        class="fa fa-trash text-danger"></i></a>
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['reply.destroy', $reply->id], 'class'=>'d-none', 'id'=>'deleteReply_'.$reply->id]) }}
                                            {{ Form::close() }}
                                        @endif
                            </span>
                                    <div class="comment text-muted ml-4">
                                        {{ $reply->body }}
                                    </div>
                                </div>
                            @endforeach
                            <div class="new-reply text-center" id="replyToComment_{{ $comment->id }}"
                                 style="display: none">
                                {!! Form::model($reply, ['method'=>'POST','action' => ['ReplyController@store', $comment->id], 'id'=>'replyToCommentForm_'.$comment->id]) !!}
                                <div class="form-group">
                                    <label for="newCommentInput">New reply</label>
                                    <textarea class="form-control w-50 m-auto" id="newCommentInput" name="body"
                                              rows="3"></textarea>
                                </div>
                                <a href="#" id="cancelNewReply" class="btn btn-secondary btn-sm"
                                   onclick="$('#replyToComment_{{ $comment->id }}').css('display', 'none')">Cancel</a>
                                <a href="#" onclick="$('#replyToCommentForm_{{ $comment->id }}').submit()"
                                   class="btn btn-success btn-sm">Reply</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-5" id="newCommentDivForm" style="display: none">
                    <div class="new-comment text-center">
                        {!! Form::model($comment, ['method'=>'POST','action' => 'CommentController@store', 'id'=>'FormNewComment']) !!}
                        <input type="hidden" name="issue_id" value="{{ $issue->id }}">
                        <div class="form-group">
                            <label for="newCommentInput">New comment</label>
                            <textarea class="form-control w-50 m-auto" id="newCommentInput" name="body"
                                      rows="3"></textarea>
                        </div>
                        <a href="#" id="cancelNewComment" class="btn btn-secondary btn-sm">Cancel</a>
                        <a href="#" onclick="$('#FormNewComment').submit()" class="btn btn-success btn-sm">Comment</a>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-12 mt-5" id="newCommentDivButton">
                    <div class="text-center">
                        <button class="btn btn-success btn-sm" id="newCommentButton">New Comment...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    Delete Comment Modal--}}
    <div class="modal fade" id="deleteCommentModal" tabindex="-1" role="dialog" aria-labelledby="deleteCommentModalLable"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="confirmDeleteComment" class="btn btn-danger float-right"><i
                                class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    </div>
    {{--    End Delete Comment Modal--}}

    {{--    Delete Reply Modal--}}
    <div class="modal fade" id="deleteReplyModal" tabindex="-1" role="dialog" aria-labelledby="deleteReplyModalLable"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>
                    </button>
                    <button type="button" id="confirmDeleteReply" class="btn btn-danger float-right"><i
                                class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    </div>
    {{--    End Delete Reply Modal--}}
@endsection

@section('script')
    <script>
        $('#newCommentButton').click(function () {
            $('#newCommentDivButton').css('display', 'none');
            $('#newCommentDivForm').css('display', 'block');
        });
        $('#cancelNewComment').click(function () {
            console.log('comment')
            $('#newCommentDivForm').css('display', 'none');
            $('#newCommentInput').val(null);
            $('#newCommentDivButton').css('display', 'block');
        });
    </script>

    <script>
        $('#deleteCommentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var comment_id = button.data('comment_id')
            var modal = $(this)
            modal.find('.modal-title').html('Delete comment <span class="text-muted">' + comment_id + '</span>')
            modal.find('.modal-body input').val(comment_id)
            $('#confirmDeleteComment').click(() => {
                $('#deleteComment_' + comment_id).submit();
            });
        })
    </script>

    <script>
        $('#deleteReplyModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var reply_id = button.data('reply_id')
            var modal = $(this)
            modal.find('.modal-title').html('Delete reply <span class="text-muted">' + reply_id + '</span>')
            modal.find('.modal-body input').val(reply_id)
            $('#confirmDeleteReply').click(() => {
                $('#deleteReply_' + reply_id).submit();
            });
        })
    </script>

    <script>
        $('.btn-add-reply').on('click', function () {
            var comment_id = $(this).attr('data-comment_id');
            if ($('#replyToComment_' + comment_id).css('display') == 'block') {
                $('#replyToComment_' + comment_id).css('display', 'none');
            } else {
                $('#replyToComment_' + comment_id).css('display', 'block');
            }
        });
    </script>
@endsection