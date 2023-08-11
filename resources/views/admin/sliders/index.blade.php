@extends('layout.admin.main')
<base href="/public">
@section('content')
    {{-- @include('admin.brands.modal') --}}

    @if (session('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success</strong> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card my-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title">Sliders</h4>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/admin/add/sliders') }}" class="btn btn-success" style="float: right">Add</a>

                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <th>imgaes</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($slider as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td><img src="{{asset($item->images)}}" alt="not found"></td>

                                    <td style="background:{{ $item->status == 1 ? 'red' : 'green' }}; display:block; margin-top:20px; color:white; font-weight:800; text-align:center; border-radius:20px; ">
                                        {{ $item->status == 1 ? 'HIdden' : 'Visiable' }}</td>
                                    <td>
                                        <a href="{{ url('/admin/sliders/edit/' . $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ url('/admin/sliders/delete/' . $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No slider Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
