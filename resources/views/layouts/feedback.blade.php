@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ $message}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <h4>{{ session('error' )}}</h4>
        <ul class="mb-0">
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif