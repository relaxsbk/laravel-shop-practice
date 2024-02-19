@if(session()->has('success'))
    <div class="container">
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
    </div>

@endif
