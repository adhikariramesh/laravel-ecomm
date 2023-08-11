@extends('layout.admin.main')

@section('content')
    @if (session('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif



    <div class="col-lg-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Add Sliders</h4>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/admin/sliders') }}" class="btn btn-danger" style="float: right">BACK</a>

                    </div>

                </div>
                <form action="{{ url('/admin/slider/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="md-3 col-6">
                            <label for=""class="my-4">Select Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="md-3 col-6">
                            <label for="" class="my-4">Staus</label>
                            <input type="checkbox" name="status" id="status" width="30px">
                            <span>checked=hidden & unchecked=visiable</span>
                        </div>
                        <button type="submit" name="" class="btn btn-primary">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection
