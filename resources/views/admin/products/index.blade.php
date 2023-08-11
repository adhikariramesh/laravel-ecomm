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
                        <h4 class="card-title">Products</h4>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/admin/add/products') }}" class="btn btn-success" style="float: right">Add</a>

                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category Id</th>
                                <th>Brands</th>
                                <th>Selling price</th>
                                <th>Original price</th>
                                <th>Tranding</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td> {{ $item->selling_price }}</td>
                                    <td> {{ $item->original_price }}</td>

                                    <td
                                        style="background:{{ $item->tranding == 1 ? 'green' : 'yellow' }}; display:block; margin-top:20px; color:white; font-weight:800; text-align:center; border-radius:20px; ">
                                        {{ $item->tranding == 1 ? 'Yes' : 'No' }}</td>
                                        <td> {{ $item->quantity }}</td>
                                    <td style="background:{{ $item->status == 1 ? 'red' : 'green' }}; display:block; margin-top:20px; color:white; font-weight:800; text-align:center; border-radius:20px; ">
                                        {{ $item->status == 1 ? 'HIdden' : 'Visiable' }}</td>
                                    <td>
                                        <a href="{{ url('/admin/product/edit/' . $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ url('/admin/product/delete/' . $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No colors Found</td>
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
