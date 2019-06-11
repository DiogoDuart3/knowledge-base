@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home') }}" class="btn btn-outline-primary"><i class="fas fa-angle-left"></i>
                    Voltar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staticEmail" placeholder="Subject">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                        <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select class="form-control">
                                    <option disabled selected>Selecione</option>
                                    <option value="">Laravel Frontend</option>
                                    <option value="">Laravel Backend</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">PHP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Problem</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"
                                       disabled>
                                <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success float-right">Criar</button>
                        </div>
                    </div>
                </form>
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
        let editor = CKEDITOR.replace('editor1', {
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700',
            // Use named CKFinder browser route
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            // Use named CKFinder connector route
            filebrowserUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files'

        });
        CKFinder.setupCKEditor(editor);
    </script>
@endsection