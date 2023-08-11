

<div class="col-md-12 grid-margin stretch-card my-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title text-dark" style="margin-left: 50px; font-weight:800;">All Category</h4>
            <div class="container">
                <div class="row">
                    @if ($category)
                        @foreach ($category as $item)
                            <div class="card" style="width: 18rem; margin:20px;">
                                <a href="{{ url('/collactions' . '/' . $item->id) }}">
                                    <img src="{{ $item->images }}" class="card-img-top" alt="Not Found" width="300px"
                                        height="300px">
                                    <div class="card-body">
                                        <p class="card-text" style="text-decoration: none; text-align:center; font-weight: 700; text-transform:capitalize; font-size:22px;">{{ $item->name }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
