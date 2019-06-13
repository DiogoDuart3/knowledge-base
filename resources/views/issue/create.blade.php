@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Create new issue</h1>

        <a href="{{ route('manage-users.index') }}" class="btn text-primary" data-toggle="tooltip"
           data-placement="top" title="Back"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
        <a onclick="document.getElementById('formCreate').submit()" class="btn text-success float-right"
           data-toggle="tooltip"
           data-placement="top" title="Add mew issue"><i class="fas fa-check fa-2x"></i></a>
        <hr>
        @include('layouts.messages')
        <div class="row">
            <div class="col-12 mt-5">
                {!! Form::model($issue, ['method'=>'POST', 'action'=>['IssueController@store'], 'id'=>'formCreate']) !!}
                <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" rows="10" cols="80"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="issue_solution" class="col-sm-2 col-form-label">Issue solution</label>
                    <div class="col-sm-10">
                        <textarea name="issue_solution" id="issue_solution" rows="10" cols="80"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <select class="form-control" name="category_id">
                                <option disabled selected>Selecione</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
    </script>
@endsection