@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="text-white text-xl font-medium bg-red-600 px-4 py-2 rounded-1.5lg text-center mx-auto">
        {{Session::get('error')}}
    </div>
@endif

@if(Session::has('success'))
    <div class="text-white text-xl font-medium bg-primary px-4 py-2 rounded-1.5lg text-center mx-auto">
        {{Session::get('success')}}
    </div>
@endif
