@if(session()->has('success-message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success-message') }}
    </div>
@endif

@if(session()->has('error-message'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error-message') }}
    </div>
@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif