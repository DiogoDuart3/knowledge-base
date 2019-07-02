@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Edit issue <span class="text-muted">{{ $issue->subject }}</span></h1>

        <a href="{{ route('issue.show', $issue->id) }}" class="btn text-primary" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fa fa-arrow-circle-left fa-2x"></i></a>
        <a onclick="document.getElementById('formEdit').submit()" class="btn text-success float-right"
           data-toggle="tooltip"
           style="cursor: pointer"
           data-placement="top" title="Apply changes to issue"><i class="fa fa-check fa-2x"></i></a>
        <hr>
        @include('layouts.messages')

        <div class="row text-center" id="loading">
            <div class="col-12">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="col-12 mt-2">
                <h3>Loading...</h3>
            </div>
        </div>

        <div class="row" id="loaded" style="display: none">
            <div class="col-12 mt-5">
                {!! Form::model($issue, ['method'=>'PATCH', 'action'=>['IssueController@update', $issue->id], 'id'=>'formEdit']) !!}
                <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"
                               value="{{ old('subject') ? old('subject') : $issue->subject }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" rows="10"
                                  cols="80">{{ old('description') ? old('description') : $issue->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="issue_solution" class="col-sm-2 col-form-label">Issue solution</label>
                    <div class="col-sm-10">
                        <textarea name="issue_solution" id="issue_solution" rows="10"
                                  cols="80">{{ old('issue_solution') ? old('issue_solution') : $issue->issue_solution }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" name="category_id">
                                <option disabled>Select...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === $issue->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2" for="tags">Tags</label>
                    <div class="col-sm-10">
                        <select multiple class="form-control" name="tags[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, $issue->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('ckfinder::setup')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        let description = CKEDITOR.replace('description', {
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700',
            // Use named CKFinder browser route
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            // Use named CKFinder connector route
            filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'

        });
        let issue_solution = CKEDITOR.replace('issue_solution', {
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700',
            // Use named CKFinder browser route
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            // Use named CKFinder connector route
            filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'

        });
        CKFinder.setupCKEditor(description);
        CKFinder.setupCKEditor(issue_solution);

        $(document).ready(function(){
            $('#loading').css('display', 'none');
            $('#loaded').css('display', 'flex');
        });
    </script>
@endsection